-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 06:39 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos_retur`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` bigint(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `keterangan` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(20) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL DEFAULT 'default.png',
  `barcode` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `harga_beli` varchar(30) DEFAULT NULL,
  `harga_jual` varchar(30) DEFAULT NULL,
  `harga_pelanggan` int(11) DEFAULT NULL,
  `harga_toko` int(11) DEFAULT NULL,
  `harga_sales` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `gambar`, `barcode`, `nama_barang`, `id_kategori`, `id_satuan`, `id_supplier`, `harga_beli`, `harga_jual`, `harga_pelanggan`, `harga_toko`, `harga_sales`, `stok`, `is_active`) VALUES
(1, 'BRG-00001', 'Capture1.JPG', 'MKN01', 'Whiskas Cat', 1, 1, 1, '7000', '10000', 8000, 10000, 0, 19, 1),
(2, 'BRG-00002', 'Capture.PNG', 'BRG-00002', 'Whiskas Kaleng', 1, 3, 2, '20000', '25000', 22000, 25000, 0, 0, 1),
(3, 'BRG-00003', 'Premium_Cat_Litter___Pasir_Kucing_Gumpal_Wangi___5_5_Liter_B.jpg', 'PSR-001', 'Premium Cat Litter', 4, 5, 5, '30000', '35000', 32000, 35000, 0, 0, 1),
(4, 'BRG-00004', 'rug-1603700694328-0.jpeg', 'PSR-002', 'Top Cat Litter', 4, 5, 4, '30000', '37000', 35000, 37000, 0, 0, 1),
(5, 'BRG-00005', 'bola.PNG', 'MN-001', 'Cat Toys Bola Jeruji Tikus Dog Toys', 3, 1, 3, '10000', '12000', 11000, 12000, 0, 0, 1),
(6, 'BRG-00006', 'arc.PNG', 'MN-002', 'ARTHACAT Cat Tree KOTTUR', 3, 1, 1, '170000', '200000', 185000, 200000, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cs` int(11) NOT NULL,
  `kode_cs` varchar(20) DEFAULT NULL,
  `nama_cs` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `jenis_cs` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cs`, `kode_cs`, `nama_cs`, `jenis_kelamin`, `telp`, `email`, `alamat`, `jenis_cs`) VALUES
(1, 'CS-000001', 'Umum', 'Laki-Laki', '000000', 'umum@gmail.com', 'Makassar', 'Umum'),
(2, 'CS-000002', 'Testing', 'Laki-Laki', '28936472', 'test@gmail.com', 'as', 'Umum'),
(3, 'CS-000003', 'Pratama', 'Laki-Laki', '082194131328', 'pratama@gmail.com', 'jln kemakmuran no. 25 Depok II tengah', 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `detil_hutang`
--

CREATE TABLE `detil_hutang` (
  `id_detil_hutang` bigint(20) NOT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_hutang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_pembelian`
--

CREATE TABLE `detil_pembelian` (
  `id_detil_beli` bigint(20) NOT NULL,
  `id_beli` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `kode_detil_beli` varchar(20) DEFAULT NULL,
  `hrg_beli` int(11) DEFAULT NULL,
  `hrg_jual` int(11) DEFAULT NULL,
  `qty_beli` int(11) DEFAULT NULL,
  `subtotal` varchar(30) DEFAULT NULL,
  `is_retur` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_pembelian`
--

INSERT INTO `detil_pembelian` (`id_detil_beli`, `id_beli`, `id_barang`, `kode_detil_beli`, `hrg_beli`, `hrg_jual`, `qty_beli`, `subtotal`, `is_retur`) VALUES
(1, 1, 1, 'DB-0000001', 7000, 10000, 20, '140000', 0),
(2, NULL, 1, 'DB-0000002', 7000, 10000, 10, '70000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detil_penginapan`
--

CREATE TABLE `detil_penginapan` (
  `id_detil_penginapan` int(11) NOT NULL,
  `id_penginapan` int(11) DEFAULT NULL,
  `hewan` enum('kucing','anjing') NOT NULL,
  `nama_servis` varchar(50) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detil_penjualan`
--

CREATE TABLE `detil_penjualan` (
  `id_detil_jual` bigint(20) NOT NULL,
  `id_jual` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_servis` int(11) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `kode_detil_jual` varchar(20) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `harga_item` int(11) DEFAULT NULL,
  `qty_jual` int(11) DEFAULT NULL,
  `subtotal` varchar(30) DEFAULT NULL,
  `is_retur` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_penjualan`
--

INSERT INTO `detil_penjualan` (`id_detil_jual`, `id_jual`, `id_barang`, `id_servis`, `id_karyawan`, `kode_detil_jual`, `diskon`, `harga_item`, `qty_jual`, `subtotal`, `is_retur`) VALUES
(1, 1, 1, NULL, NULL, 'DJ-0000001', 0, 10000, 10, '100000', 0),
(3, 2, NULL, 2, 0, 'DJ-0000003', 0, 50000, 1, '50000', 0),
(5, 2, NULL, 2, 0, 'DJ-0000005', 0, 50000, 1, '50000', 0),
(6, 3, NULL, 1, 1, 'DJ-0000006', 0, 30000, 1, '30000', 0),
(7, 4, NULL, 1, 0, 'DJ-0000007', 0, 30000, 1, '30000', 0),
(9, 4, NULL, 1, 1, 'DJ-0000008', 0, 30000, 1, '30000', 0),
(10, 5, NULL, 2, 1, 'DJ-0000009', 0, 50000, 1, '50000', 0),
(11, 6, 1, NULL, NULL, 'DJ-0000010', 0, 10000, 1, '10000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detil_piutang`
--

CREATE TABLE `detil_piutang` (
  `id_detil_piutang` bigint(20) NOT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_piutang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_retur_pembelian`
--

CREATE TABLE `detil_retur_pembelian` (
  `id_detil_retur_pembelian` int(11) NOT NULL,
  `id_retur_pembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `mutasi` enum('in','out') NOT NULL,
  `kondisi` enum('baik','rusak') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detil_retur_penjualan`
--

CREATE TABLE `detil_retur_penjualan` (
  `id_detil_retur_penjualan` int(11) NOT NULL,
  `id_retur_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `mutasi` enum('in','out') NOT NULL,
  `kondisi` enum('baik','rusak') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` bigint(20) NOT NULL,
  `id_beli` int(11) DEFAULT NULL,
  `tgl_hutang` datetime DEFAULT NULL,
  `jml_hutang` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `jatuh_tempo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `gaji` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gaji`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Kasir', 1500000, 'Karyawan Kasir', '2022-01-29 16:31:30', NULL),
(3, 'Gudang', 1500000, 'Karywan Gudang yang berurusan dengan stock barang dan supplier untuk dibeli ', '2022-03-14 16:32:08', NULL),
(4, 'Bendahara', 2000000, 'Mengelola Keuangan', '2022-03-14 16:32:29', NULL),
(5, 'Owner', 0, 'pemilik toko', '2022-03-14 16:32:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `kode_karyawan` varchar(20) DEFAULT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `telp_karyawan` varchar(15) DEFAULT NULL,
  `email_karyawan` varchar(50) DEFAULT NULL,
  `status_karyawan` varchar(20) DEFAULT NULL,
  `tmpt_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` varchar(20) DEFAULT NULL,
  `tgl_masuk` varchar(20) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_jabatan`, `kode_karyawan`, `nama_karyawan`, `jenis_kelamin`, `telp_karyawan`, `email_karyawan`, `status_karyawan`, `tmpt_lahir`, `tgl_lahir`, `tgl_masuk`, `alamat`) VALUES
(1, 2, 'K-00001', 'Mahendra', 'Laki-Laki', '082194131328', 'mahendra.yudha12@gmail.com', 'Kontrak', 'Makassar', '07071997', '29/01/2022', 'Makassar'),
(2, 3, 'K-00002', 'yuda', 'Laki-Laki', '082194131329', 'yudapratama@gmail.com', 'Tetap', 'Bandung', '07071992', '13/03/2021', 'Bandung , Dipatiukur'),
(3, 4, 'K-00003', 'Jee', 'Perempuan', '08299100428', 'jee@gmail.com', 'Tetap', 'Jakarta', '1102199', '14/06/2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id_kas` bigint(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kode_kas` varchar(20) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `sumber` enum('transaksi','input') NOT NULL,
  `nominal` varchar(50) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id_kas`, `id_user`, `kode_kas`, `tanggal`, `jenis`, `sumber`, `nominal`, `keterangan`) VALUES
(1, 3, 'KS-0000001', '2022-01-29 23:32:53', 'Pemasukan', 'transaksi', '100000', 'Penjualan'),
(2, 3, 'KS-0000002', '2022-03-04 14:49:11', 'Pemasukan', 'transaksi', '100000', 'Penjualan'),
(3, 1, 'KS-0000003', '2022-03-05 18:35:18', 'Pemasukan', 'transaksi', '30000', 'Penjualan'),
(4, 3, 'KS-0000004', '2022-03-13 10:21:34', 'Pemasukan', 'transaksi', '60000', 'Penjualan'),
(5, 3, 'KS-0000005', '2022-03-13 10:23:42', 'Pemasukan', 'transaksi', '50000', 'Penjualan'),
(6, 3, 'KS-0000006', '2022-03-13 10:24:09', 'Pemasukan', 'transaksi', '10000', 'Penjualan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Makanan'),
(2, 'Parfum'),
(3, 'Mainan '),
(4, 'Perlengkapan');

-- --------------------------------------------------------

--
-- Table structure for table `komisi`
--

CREATE TABLE `komisi` (
  `id_komisi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_detil_jual` bigint(11) DEFAULT NULL,
  `komisi` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komisi`
--

INSERT INTO `komisi` (`id_komisi`, `id_karyawan`, `id_detil_jual`, `komisi`, `keterangan`, `tanggal`) VALUES
(1, 1, 6, 5000, 'Komisi Servis', '2022-03-04 16:00:00'),
(4, 1, 9, 5000, 'Komisi Servis', '2022-03-12 17:00:00'),
(5, 1, 10, 5000, 'Komisi Servis', '2022-03-12 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pajak_ppn`
--

CREATE TABLE `pajak_ppn` (
  `id_pajak` bigint(20) NOT NULL,
  `kode_pajak` varchar(20) DEFAULT NULL,
  `jenis` varchar(70) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `keterangan` text,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kode_beli` varchar(20) DEFAULT NULL,
  `tgl_faktur` varchar(20) DEFAULT NULL,
  `faktur_beli` varchar(20) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `method` varchar(30) DEFAULT NULL,
  `total` varchar(30) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembali` int(11) DEFAULT NULL,
  `tgl` datetime NOT NULL,
  `is_active` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `id_supplier`, `id_user`, `kode_beli`, `tgl_faktur`, `faktur_beli`, `diskon`, `method`, `total`, `bayar`, `kembali`, `tgl`, `is_active`, `status`) VALUES
(1, 1, 13, 'PB-0000001', '2022-01-30', '30012022/WhiskasCat', 0, 'Cash', '140000', 140000, 0, '2022-01-29 17:30:16', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `id_penggajian` int(11) NOT NULL,
  `referensi` varchar(20) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  `komisi` int(11) NOT NULL DEFAULT '0',
  `potong_gaji` int(11) NOT NULL,
  `gaji_bersih` int(11) NOT NULL,
  `tanggal_gaji` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

CREATE TABLE `penginapan` (
  `id_penginapan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `antar_jemput` int(11) NOT NULL DEFAULT '0',
  `biaya_antar_jemput` int(11) DEFAULT NULL,
  `method` enum('cash','credit','debit') NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `konsumen` varchar(100) NOT NULL,
  `telp_konsumen` varchar(12) NOT NULL,
  `alamat_konsumen` varchar(200) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_jual` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_cs` int(11) DEFAULT NULL,
  `kode_jual` varchar(20) DEFAULT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  `method` varchar(30) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembali` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `hp` varchar(12) DEFAULT NULL,
  `type` enum('sales','grooming') NOT NULL DEFAULT 'sales',
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_jual`, `id_user`, `id_cs`, `kode_jual`, `invoice`, `method`, `bayar`, `kembali`, `ppn`, `tgl`, `hp`, `type`, `is_active`) VALUES
(1, 3, 1, 'KJ-0000001', 'POS20220129233253', 'Cash', 100000, 0, 0, '2022-01-29 23:32:53', NULL, 'sales', 1),
(2, 3, 1, 'KJ-0000002', 'POS20220304144911', 'Cash', 100000, 0, 0, '2022-03-04 14:49:11', NULL, 'sales', 1),
(3, 1, 1, 'KJ-0000003', 'POS20220305183518', 'Cash', 30000, 0, 0, '2022-03-05 18:35:18', NULL, 'sales', 1),
(4, 3, 1, 'KJ-0000004', 'POS20220313102134', 'Cash', 60000, 0, 0, '2022-03-13 10:21:34', '23423', 'grooming', 1),
(5, 3, 2, 'KJ-0000005', 'POS20220313102342', 'Cash', 50000, 0, 0, '2022-03-13 10:23:42', '28936472', 'grooming', 1),
(6, 3, 1, 'KJ-0000006', 'POS20220313102409', 'Cash', 10000, 0, 0, '2022-03-13 10:24:09', NULL, 'sales', 1);

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `id_piutang` bigint(20) NOT NULL,
  `id_jual` int(11) DEFAULT NULL,
  `tgl_piutang` datetime DEFAULT NULL,
  `jml_piutang` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `jatuh_tempo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_perusahaan`
--

CREATE TABLE `profil_perusahaan` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) DEFAULT NULL,
  `alamat_toko` varchar(100) DEFAULT NULL,
  `telp_toko` varchar(15) DEFAULT NULL,
  `fax_toko` varchar(15) DEFAULT NULL,
  `email_toko` varchar(50) DEFAULT NULL,
  `website_toko` varchar(50) DEFAULT NULL,
  `logo_toko` varchar(50) DEFAULT NULL,
  `IG` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_perusahaan`
--

INSERT INTO `profil_perusahaan` (`id_toko`, `nama_toko`, `alamat_toko`, `telp_toko`, `fax_toko`, `email_toko`, `website_toko`, `logo_toko`, `IG`) VALUES
(1, 'Nab Petshop', 'Jln. Borong Raya no 2', '085674893092', '(0333) 094837', 'nabpetshop@gmail.com', 'www.instagram/nabpetshop.com', 'Capture.JPG', 'brusedbykarin');

-- --------------------------------------------------------

--
-- Table structure for table `retur_pembelian`
--

CREATE TABLE `retur_pembelian` (
  `id_retur_pembelian` int(11) NOT NULL,
  `nomor` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `catatan` tinytext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `retur_penjualan`
--

CREATE TABLE `retur_penjualan` (
  `id_retur_penjualan` int(11) NOT NULL,
  `nomor` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `catatan` tinytext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`) VALUES
(1, 'Pcs'),
(2, 'Kg'),
(3, 'Gr'),
(4, 'Cm'),
(5, 'Ltr');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `id_servis` bigint(20) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama_servis` varchar(200) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` text,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`id_servis`, `kode`, `nama_servis`, `harga`, `keterangan`, `status`) VALUES
(1, 'SV082041', 'Grooming', 30000, 'Grooming Biasa', 'Aktif'),
(2, 'SV082429', 'Pet Hotel', 50000, 'Hotel Penginapan', 'Aktif'),
(3, 'SV173523', 'Grooming Kutu/jamur', 55000, 'untuk Kutu atau Jamur', 'Aktif'),
(4, 'SV173600', 'Grooming Full Service', 70000, 'Full Service', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` bigint(20) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok_opname`
--

CREATE TABLE `stok_opname` (
  `id_stok_opname` bigint(20) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `stok` varchar(10) DEFAULT NULL,
  `stok_nyata` varchar(10) DEFAULT NULL,
  `selisih` varchar(10) DEFAULT NULL,
  `nilai` varchar(50) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `kode_supplier` varchar(20) DEFAULT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `alamat_supplier` varchar(100) DEFAULT NULL,
  `telp_supplier` varchar(15) DEFAULT NULL,
  `fax_supplier` varchar(15) DEFAULT NULL,
  `email_supplier` char(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `rekening` varchar(30) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `fax_supplier`, `email_supplier`, `bank`, `rekening`, `atas_nama`) VALUES
(1, 'SP-00001', 'CV Muda Karya', 'JL Bermuda', '082941288845', '02210093', 'muda@gmail.com', 'BCA', '197702991', 'Muda Karya'),
(2, 'SP-00002', 'Happy Pet Grosir', 'Rc Pet Shop', '087823308111', '-', '', 'BNI', '399018929', 'Happy Pet '),
(3, 'SP-00003', 'KIA Petshop', 'jln kemakmuran no. 25 Depok II tengah', '08111276876', '', 'kiapetshop@gmail.com', 'BCA', '2918900244', 'KIA Petshop'),
(4, 'SP-00004', 'Holy PetShop', 'Semarang - Tangerang', '081228879392 ', '', 'HolyPetShop@gmail.com', 'MANDIRI', '241255611', 'Holy PetShop'),
(5, 'SP-00005', 'RC Petshop', 'Jakarta', '081908170990 ', '', 'rcpetshopjkt@gmail.com', 'BRI', '982841002', 'RC Petshop');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `tipe` varchar(30) DEFAULT NULL,
  `alamat_user` varchar(100) DEFAULT NULL,
  `telp_user` varchar(15) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_lengkap`, `password`, `tipe`, `alamat_user`, `telp_user`, `email_user`, `is_active`) VALUES
(1, 'admin', 'Administrator', '$2y$10$oagi0l6Q3v.bwPCCVgOQXOnWX1FPLAvIiIfMJwIrJjk4212ACLN7.', 'Administrator', 'Banyuwagi', '085647382748', 'admin@gmail.com', 1),
(3, 'kasir', 'Kasir', '$2y$10$nWBEdyFeReNQtbr4lGUWmuN9SXKRtpqdog2CtXPFcmqCzb6p5Bmp6', 'Kasir', 'Banyuwangi', '082236578566', 'kasir@gmail.com', 1),
(12, 'owner', 'Owner POS', '$2y$10$n9yXlD9EbDthai2rQEpfvOHgETGXsUId2DbbYIpzLond3RFTp939u', 'Owner', '', '08561235611', 'owner@gmail.com', 1),
(13, 'gudang', 'Gudang', '$2y$10$zwEPjfmnRyQ5WeGzbooCVOdvunVkMjk.OqZfQaZmebiRIddImLo8q', 'Gudang', '', '085625564512', 'gudang@gmail.com', 1),
(14, 'bendahara', 'Bendahara', '$2y$10$6KksmLKsjVNA2InDaasNJuFgBmdRRP0pQRzA05iM7xtcmQD7o2lvm', 'Bendahara', '', '085625651231', 'bendahara@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id_log` bigint(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `login` datetime DEFAULT NULL,
  `logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id_log`, `id_user`, `login`, `logout`) VALUES
(1, 14, '2022-01-29 11:48:36', '2022-01-29 05:49:00'),
(2, 13, '2022-01-29 11:49:07', '2022-01-29 05:50:40'),
(3, 13, '2022-01-29 11:50:44', '2022-01-29 05:59:13'),
(4, 1, '2022-01-29 12:03:33', '2022-01-29 06:04:57'),
(5, 3, '2022-01-29 12:05:02', '2022-01-29 06:08:07'),
(6, 14, '2022-01-29 12:08:11', '2022-01-29 17:10:52'),
(7, 1, '2022-01-29 22:58:50', '2022-01-29 17:10:52'),
(8, 14, '2022-01-29 23:11:09', '2022-01-29 17:25:13'),
(9, 3, '2022-01-29 23:25:17', '2022-01-29 17:25:34'),
(10, 13, '2022-01-29 23:25:40', '2022-01-29 17:30:32'),
(11, 14, '2022-01-29 23:30:37', '2022-01-29 17:32:01'),
(12, 3, '2022-01-29 23:32:04', '2022-02-21 17:00:52'),
(13, 14, '2022-02-14 17:56:33', '2022-02-21 17:00:52'),
(14, 3, '2022-02-21 23:00:08', '2022-02-21 17:00:52'),
(15, 13, '2022-02-21 23:01:00', '2022-02-21 17:22:01'),
(16, 3, '2022-02-21 23:22:05', '2022-02-21 17:32:18'),
(17, 13, '2022-02-21 23:32:23', '2022-02-22 02:02:51'),
(18, 3, '2022-02-22 08:01:24', '2022-02-22 02:02:51'),
(19, 13, '2022-02-22 08:02:58', '2022-02-22 02:07:07'),
(20, 14, '2022-02-22 08:07:15', '2022-03-02 09:03:03'),
(21, 1, '2022-03-02 15:02:17', '2022-03-02 09:03:03'),
(22, 3, '2022-03-02 16:25:05', '2022-03-02 10:26:22'),
(23, 13, '2022-03-02 16:26:28', '2022-03-02 10:28:22'),
(24, 3, '2022-03-02 16:28:26', '2022-03-02 10:29:37'),
(25, 14, '2022-03-02 16:29:42', '2022-03-05 12:39:17'),
(26, 3, '2022-03-04 14:17:59', '2022-03-05 12:39:17'),
(27, 1, '2022-03-05 18:10:54', '2022-03-05 12:39:17'),
(28, 3, '2022-03-05 18:39:20', '2022-03-11 15:50:18'),
(29, 13, '2022-03-08 23:44:15', '2022-03-11 15:50:18'),
(30, 1, '2022-03-11 21:40:33', '2022-03-11 15:50:18'),
(31, 3, '2022-03-11 21:50:21', '2022-03-13 10:13:44'),
(32, 3, '2022-03-13 09:54:27', '2022-03-13 10:13:44'),
(33, 3, '2022-03-13 12:59:06', '2022-03-13 10:13:44'),
(34, 3, '2022-03-13 16:12:31', '2022-03-13 10:13:44'),
(35, 12, '2022-03-13 16:13:51', '2022-03-14 17:51:52'),
(36, 1, '2022-03-14 23:17:44', '2022-03-14 17:51:52'),
(37, 3, '2022-03-14 23:51:56', '2022-03-14 17:52:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `ID_KATEGORI` (`id_kategori`),
  ADD KEY `ID_SATUAN` (`id_satuan`),
  ADD KEY `ID_SUPPLIER` (`id_supplier`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cs`);

--
-- Indexes for table `detil_hutang`
--
ALTER TABLE `detil_hutang`
  ADD PRIMARY KEY (`id_detil_hutang`);

--
-- Indexes for table `detil_pembelian`
--
ALTER TABLE `detil_pembelian`
  ADD PRIMARY KEY (`id_detil_beli`),
  ADD KEY `FK_BARANG_DETIL_PEMBELIAN` (`id_barang`),
  ADD KEY `FK_PEMBELIAN_DETIL` (`id_beli`);

--
-- Indexes for table `detil_penginapan`
--
ALTER TABLE `detil_penginapan`
  ADD PRIMARY KEY (`id_detil_penginapan`),
  ADD KEY `detil_penginapan_ibfk_1` (`id_penginapan`);

--
-- Indexes for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  ADD PRIMARY KEY (`id_detil_jual`),
  ADD KEY `FK_BARANG_PENJUALAN_DETIL` (`id_barang`),
  ADD KEY `FK_PENJUALAN_DETIL` (`id_jual`);

--
-- Indexes for table `detil_piutang`
--
ALTER TABLE `detil_piutang`
  ADD PRIMARY KEY (`id_detil_piutang`);

--
-- Indexes for table `detil_retur_pembelian`
--
ALTER TABLE `detil_retur_pembelian`
  ADD PRIMARY KEY (`id_detil_retur_pembelian`),
  ADD KEY `id_retur_penjualan` (`id_retur_pembelian`,`id_barang`),
  ADD KEY `FK_barang_retur_beli` (`id_barang`),
  ADD KEY `id_retur_pembelian` (`id_retur_pembelian`);

--
-- Indexes for table `detil_retur_penjualan`
--
ALTER TABLE `detil_retur_penjualan`
  ADD PRIMARY KEY (`id_detil_retur_penjualan`),
  ADD KEY `id_retur_penjualan` (`id_retur_penjualan`),
  ADD KEY `FK_barang_retur` (`id_barang`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`),
  ADD KEY `ID_USER` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komisi`
--
ALTER TABLE `komisi`
  ADD PRIMARY KEY (`id_komisi`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_detil_jual` (`id_detil_jual`);

--
-- Indexes for table `pajak_ppn`
--
ALTER TABLE `pajak_ppn`
  ADD PRIMARY KEY (`id_pajak`),
  ADD KEY `ID_USER` (`id_user`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `FK_MENCATAT_PEMBELIAN` (`id_user`),
  ADD KEY `FK_TRANSAKSI_PEMBELIAN` (`id_supplier`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id_penggajian`);

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id_penginapan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `FK_MELAYANI` (`id_user`),
  ADD KEY `FK_TRANSAKSI` (`id_cs`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id_piutang`);

--
-- Indexes for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  ADD PRIMARY KEY (`id_retur_pembelian`),
  ADD KEY `id_user` (`id_user`,`id_pembelian`),
  ADD KEY `FK_retur_pembelian` (`id_pembelian`);

--
-- Indexes for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  ADD PRIMARY KEY (`id_retur_penjualan`),
  ADD KEY `id_user` (`id_user`,`id_penjualan`),
  ADD KEY `FK_retur_penjualan` (`id_penjualan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id_servis`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `stok_opname`
--
ALTER TABLE `stok_opname`
  ADD PRIMARY KEY (`id_stok_opname`),
  ADD KEY `ID_BARANG` (`id_barang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `ID_USER` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detil_hutang`
--
ALTER TABLE `detil_hutang`
  MODIFY `id_detil_hutang` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detil_pembelian`
--
ALTER TABLE `detil_pembelian`
  MODIFY `id_detil_beli` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detil_penginapan`
--
ALTER TABLE `detil_penginapan`
  MODIFY `id_detil_penginapan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  MODIFY `id_detil_jual` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detil_piutang`
--
ALTER TABLE `detil_piutang`
  MODIFY `id_detil_piutang` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detil_retur_pembelian`
--
ALTER TABLE `detil_retur_pembelian`
  MODIFY `id_detil_retur_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detil_retur_penjualan`
--
ALTER TABLE `detil_retur_penjualan`
  MODIFY `id_detil_retur_penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id_komisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pajak_ppn`
--
ALTER TABLE `pajak_ppn`
  MODIFY `id_pajak` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id_penggajian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id_penginapan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id_piutang` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  MODIFY `id_retur_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  MODIFY `id_retur_penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `id_servis` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok_opname`
--
ALTER TABLE `stok_opname`
  MODIFY `id_stok_opname` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id_log` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `ITEM_SUPPLIER` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `KATEGORI_BARANG` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `SATUAN_BARANG` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `detil_pembelian`
--
ALTER TABLE `detil_pembelian`
  ADD CONSTRAINT `FK_BARANG_DETIL_PEMBELIAN` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `FK_PEMBELIAN_DETIL` FOREIGN KEY (`id_beli`) REFERENCES `pembelian` (`id_beli`);

--
-- Constraints for table `detil_penginapan`
--
ALTER TABLE `detil_penginapan`
  ADD CONSTRAINT `detil_penginapan_ibfk_1` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id_penginapan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  ADD CONSTRAINT `FK_BARANG_PENJUALAN_DETIL` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `FK_PENJUALAN_DETIL` FOREIGN KEY (`id_jual`) REFERENCES `penjualan` (`id_jual`);

--
-- Constraints for table `detil_retur_pembelian`
--
ALTER TABLE `detil_retur_pembelian`
  ADD CONSTRAINT `FK_barang_retur_beli` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_retur_pembelian_detil` FOREIGN KEY (`id_retur_pembelian`) REFERENCES `retur_pembelian` (`id_retur_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detil_retur_penjualan`
--
ALTER TABLE `detil_retur_penjualan`
  ADD CONSTRAINT `FK_barang_retur` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_retur_penjualan_detil` FOREIGN KEY (`id_retur_penjualan`) REFERENCES `retur_penjualan` (`id_retur_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komisi`
--
ALTER TABLE `komisi`
  ADD CONSTRAINT `komisi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komisi_ibfk_2` FOREIGN KEY (`id_detil_jual`) REFERENCES `detil_penjualan` (`id_detil_jual`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD CONSTRAINT `penginapan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  ADD CONSTRAINT `FK_retur_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_beli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_retur_pembelian` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  ADD CONSTRAINT `FK_retur_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_jual`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_retur` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
