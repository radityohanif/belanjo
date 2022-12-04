-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2021 pada 16.20
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belanjo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `password`, `email`, `type`) VALUES
('alfamart', '123', 'alfamart@gmail.com', 'mitra'),
('andari', '123', 'andari@gmail.com', 'customer'),
('hanif', '123', 'radityo.hanif@gmail.com', 'customer'),
('ilyas', '123', 'ilyas@gmail.com', 'customer'),
('mumtaz', '123', 'mumtaz@gmail.com', 'customer'),
('pasarpucung', '123', 'pasarpucung@gmail.com', 'mitra'),
('radit', 'radit123', 'radit@gmail.com', 'customer'),
('ramadhan', '123', 'ramadhan@gmail.com', 'customer'),
('superindo', '123', 'superindo@gmail.com', 'mitra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`username`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `foto`) VALUES
('andari', '', 0, '0000-00-00', '', 'default.jpg'),
('hanif', '', 0, '0000-00-00', '', 'hanif.jpg'),
('ilyas', '', 0, '0000-00-00', '', 'ilyas.jpg'),
('mumtaz', '', 0, '0000-00-00', '', 'mumtaz.jpg'),
('radit', '', 0, '0000-00-00', '', 'default.jpg'),
('ramadhan', '', 0, '0000-00-00', '', 'ramadhan.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_andari`
--

CREATE TABLE `keranjang_andari` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang_andari`
--

INSERT INTO `keranjang_andari` (`id`, `id_produk`, `quantity`) VALUES
(5, 97, 4),
(6, 98, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_hanif`
--

CREATE TABLE `keranjang_hanif` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_ilyas`
--

CREATE TABLE `keranjang_ilyas` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang_ilyas`
--

INSERT INTO `keranjang_ilyas` (`id`, `id_produk`, `quantity`) VALUES
(8, 106, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_mumtaz`
--

CREATE TABLE `keranjang_mumtaz` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang_mumtaz`
--

INSERT INTO `keranjang_mumtaz` (`id`, `id_produk`, `quantity`) VALUES
(1, 107, 2),
(2, 111, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_radit`
--

CREATE TABLE `keranjang_radit` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang_radit`
--

INSERT INTO `keranjang_radit` (`id`, `id_produk`, `quantity`) VALUES
(1, 84, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_ramadhan`
--

CREATE TABLE `keranjang_ramadhan` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang_ramadhan`
--

INSERT INTO `keranjang_ramadhan` (`id`, `id_produk`, `quantity`) VALUES
(2, 85, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `username` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`username`, `alamat`, `foto`) VALUES
('alfamart', '', 'alfamart.jpg'),
('pasarpucung', '', 'pasarpucung.png'),
('superindo', '', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `username_mitra` varchar(100) NOT NULL,
  `username_customer` varchar(100) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'menunggu konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `username_mitra`, `username_customer`, `nama_penerima`, `alamat_penerima`, `id_produk`, `quantity`, `total`, `waktu`, `status`) VALUES
(1, 'pasarpucung', 'radit', 'Raditya Dika', 'Pabuaran Asri', 84, 1, 500000, '2021-06-13 06:16:09', 'dikonfirmasi'),
(2, 'pasarpucung', 'mumtaz', 'Mumtaz ', 'Perumahan Gunung Asri', 107, 2, 65000, '2021-06-13 06:40:36', 'dikonfirmasi'),
(3, 'alfamart', 'mumtaz', 'Mumtaz ', 'Perumahan Gunung Asri', 111, 1, 20500, '2021-06-13 06:40:36', 'menunggu konfirmasi'),
(4, 'pasarpucung', 'ramadhan', 'Hanif Radityo', 'Cibinong', 105, 2, 135600, '2021-06-13 20:28:24', 'dikonfirmasi'),
(5, 'alfamart', 'ramadhan', 'Hanif Radityo', 'Cibinong', 85, 10, 70000, '2021-06-13 20:28:24', 'menunggu konfirmasi'),
(6, 'pasarpucung', 'ilyas', 'Mumtaz', 'Pondok Labu', 125, 2, 30000, '2021-06-13 20:47:55', 'dikonfirmasi');

--
-- Trigger `pembelian`
--
DELIMITER $$
CREATE TRIGGER `konfirmasi_pembelian` AFTER UPDATE ON `pembelian` FOR EACH ROW BEGIN
    if NEW.status = "dikonfirmasi" then
        INSERT INTO penjualan
        SET
        username_mitra = OLD.username_mitra,
        username_customer = OLD.username_customer,
        alamat_penerima = OLD.alamat_penerima,
        id_produk = OLD.id_produk,
        quantity = OLD.quantity,
        total = OLD.total,
        waktu = NOW(),
        nama_penerima = OLD.nama_penerima;
    END if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `username_mitra` varchar(100) NOT NULL,
  `username_customer` varchar(100) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `username_mitra`, `username_customer`, `nama_penerima`, `alamat_penerima`, `id_produk`, `quantity`, `total`, `waktu`) VALUES
(1, 'pasarpucung', 'radit', 'Raditya Dika', 'Pabuaran Asri', 84, 1, 500000, '2021-06-13 07:23:31'),
(2, 'pasarpucung', 'mumtaz', 'Mumtaz ', 'Perumahan Gunung Asri', 107, 2, 65000, '2021-06-13 07:27:36'),
(3, 'pasarpucung', 'ilyas', 'Mumtaz', 'Pondok Labu', 125, 2, 30000, '2021-06-13 20:48:46'),
(4, 'pasarpucung', 'ramadhan', 'Hanif Radityo', 'Cibinong', 105, 2, 135600, '2021-06-13 21:04:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `username_mitra` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `format_foto` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `username_mitra`, `nama`, `harga`, `kategori`, `format_foto`, `deskripsi`) VALUES
(84, 'pasarpucung', 'Kurma Sukari 500 Gr', '500000', 'makanan pokok', 'jpg', 'Kondisi: Baru<br />\r\nBerat: 3.300 Gram<br />\r\nKategori: Buah-buahan<br />\r\nEtalase: Kurma<br />\r\n<br />\r\nDistributor Buah-Buahan Arab......<br />\r\n<br />\r\nKurma Sukari Grosir<br />\r\n<br />\r\nTersedia kemasan 1 Kg , 500 gr , dan 250 gr (TERSEDIA LINK VARIAN DI BAWAH)<br />\r\n<br />\r\nManisnya Kurma Sukari alami tanpa tambahan gula dan pengawet lainnya, karena itu sangat diminati penggemar kurma yang suka dengan manisnya.<br />\r\n<br />\r\n<br />\r\nManfaat Kurma :<br />\r\n- Menjaga kesehatan pencernaan<br />\r\n- Meningkatkkan energi dengan cepat<br />\r\n- Mencegah risiko diabetes<br />\r\n- Menangkal radikal bebas<br />\r\n- Membantu menurunkan berat badan<br />\r\n- Memperkuat tulang<br />\r\n- Meningkatkan keseharan jantung'),
(85, 'alfamart', 'Mangga Arumanis', '7000', 'makanan pokok', 'jpg', 'Mangga adalah buah berwarna hijau, buah mangga rasanya sangat manis gesss'),
(86, 'alfamart', 'Bawang Merah', '16000', 'makanan pokok', 'png', 'Kondisi: Baru<br />\r\nBerat : 200 Gram<br />\r\nKategori : Kebutuhan Mingguan<br />\r\nBawang Merah fresh panen<br />\r\nKONDISI:<br />\r\n*Dibeli dari petani indonesia<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 200 Gram'),
(87, 'alfamart', 'Yakult ', '15000', 'minuman', 'jpeg', 'Sayangi Keluargamu<br />\r\nminum yakult tiap hari :)<br />\r\n<br />\r\n** kini tersedia yakult di aplikasi belanjo'),
(90, 'pasarpucung', 'Timun Lokal 500 Gram', '20000', 'makanan pokok', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 500 Gram<br />\r\nKategori : Kebutuhan Mingguan<br />\r\nTimun lokal dijamin fresh panen<br />\r\nKONDISI:<br />\r\n*Dibeli dari petani indonesia<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 500 Gram<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0811...'),
(91, 'pasarpucung', 'Teh Gelas Minuman Teh Alami', '5000', 'minuman', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 350 Ml<br />\r\nKategori : Kebutuhan Harian<br />\r\nTeh dengan rasa yang enak dan kandungan nutrisi yang lengkap dan seimbang.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 350 Ml<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0822...'),
(95, 'alfamart', 'Roma Biskuit Kelapa', '8500', 'makanan pokok', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 300 Gram<br />\r\nKategori : Kebutuhan Harian<br />\r\nRoma biskuit kelapa, terbuat dari bahan bahan pilihan.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 2 pcs'),
(96, 'alfamart', 'Bayam 200 Gram', '6500', 'makanan pokok', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 200 Gram<br />\r\nKategori : Kebutuhan Mingguan<br />\r\nSayuran Pakcoy dijamin fresh panen ditanam hidroponik<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 200 Gram<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0811...'),
(97, 'alfamart', 'Kangkung 350 Gram', '7000', 'makanan pokok', 'jpg', 'saya baris pertama<br />\r\nsaya baris kedua'),
(98, 'alfamart', 'Ikan Tuna 500 Gram', '50500', 'makanan pokok', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 200 Gram<br />\r\nKategori : Kebutuhan Mingguan<br />\r\nSayuran Pakcoy dijamin fresh panen ditanam hidroponik<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 200 Gram<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0811...'),
(99, 'alfamart', 'Ikan Kakap 500 Gram', '67500', 'makanan pokok', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 200 Gram<br />\r\nKategori : Kebutuhan Mingguan<br />\r\nSayuran Pakcoy dijamin fresh panen ditanam hidroponik<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 200 Gram<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0811...'),
(105, 'pasarpucung', 'Bebelove Susu Formula', '67800', 'makanan bayi', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 200 Gram<br />\r\nKategori : Kebutuhan Mingguan<br />\r\nJagung baby dijamin fresh panen ukuran mini.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 200 Gram<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0811...'),
(106, 'pasarpucung', 'Milna Goodmil Beras Merah Ayam', '35000', 'makanan bayi', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 200 Gram<br />\r\nKategori : Kebutuhan Mingguan<br />\r\nJagung baby dijamin fresh panen ukuran mini.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 200 Gram<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0811...'),
(107, 'pasarpucung', 'Milna Goodmil Beras Merah Pisang', '32500', 'makanan bayi', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 200 Gram<br />\r\nKategori : Kebutuhan Mingguan<br />\r\nJagung baby dijamin fresh panen ukuran mini.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 200 Gram<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0811...'),
(108, 'pasarpucung', 'Nestle Lactogen Susu Formula', '78500', 'makanan bayi', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 200 Gram<br />\r\nKategori : Kebutuhan Mingguan<br />\r\nJagung baby dijamin fresh panen ukuran mini.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 200 Gram<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0811...'),
(109, 'pasarpucung', 'Kentang', '5000', 'makanan pokok', 'jpg', 'kentang'),
(110, 'alfamart', 'Kentang', '12500', 'makanan pokok', 'jpg', 'kentang '),
(111, 'alfamart', 'Gula Halus 250 Gram', '20500', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 250 Gram<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nGula halus, berasal dari gula halus pilihan, higienis dan berkualitas.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 250 Gram<br />\r\n*Tidak ada bahan pengawet'),
(112, 'alfamart', 'Beras Super Pandan Wangi', '80000', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 5 Kilogram<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nBeras pandan pilihan, higienis dan berkualitas.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 5 Kilogram<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0888...'),
(113, 'alfamart', 'Kacang Hijau 500 Gram', '5500', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 500 Gram<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nBerasal dari kacang hijau terbaik dan berkulitas.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 500 Gram<br />\r\n*Tidak ada bahan pengawet<br />\r\n'),
(114, 'alfamart', 'Bawang Merah Goreng 60 G', '20000', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 60 Gram<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nDengan bawang merah pilihan yang diolah dan dikemas secara modern.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 60 Gram<br />\r\n*Tidak ada bahan pengawet'),
(115, 'alfamart', 'Garam 500 Gram', '3000', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 500 Gram<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nGaram konsumsi beryodium.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 500 Gram<br />\r\n*Tidak ada bahan pengawet'),
(116, 'alfamart', 'Santan Kelapa 200 Ml', '11500', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 200 Ml<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nSantan kelapa yang terbuat dari bahan berkualitas.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 200 Ml<br />\r\n*Tidak ada bahan pengawet'),
(117, 'alfamart', 'Beras Ramos Super 5 Kg', '95000', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 5 Kilogram<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nBeras pilihan yang diproses dan dikemas secara modern sehingga kualitas dan kandungan nutrisi pada beras terjamin.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 5 Kilogram<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0888...<br />\r\n'),
(118, 'alfamart', 'Minyak Goreng 2 Liter', '25000', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 2 Liter<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nDibuat dari kelapa sawit berkualitas. Warna kuning keemasan berasal dari beta karoten alam.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 2 Liter<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0888...'),
(119, 'alfamart', 'Dua Belibis Saus Cabe 340 Ml', '32000', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 340 Ml<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nDua Belibis Saus Cabe adalah produk berupa saus cabe yang dapat digunakan untuk melengkapi saat menyantap berbagai hidangan. Terbuat dari cabe pilihan rasa saus yang menggugah selera.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 340 Ml<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0888...'),
(120, 'alfamart', 'Palmia Royal Butter Margarine 200 Gram', '15000', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 200 Gram<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nDiperkaya dengan 8 vitamin (A, B1, B2, B12, D, E, Niasin, Asam Folat) yang sangat baik. Palmia Serbaguna dengan formula baru membuat aroma dari margarin ini semakin harum. Palmia Serbaguna sangat baik digunakan untuk masakan tumis, baking, dan memanggang.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 200 Gram<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0888...'),
(121, 'alfamart', 'Abc Kecap Manis Reffil 520 Ml', '15000', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 520 Ml<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nKecap manis ABC dibuat dengan kedelai, gandum dan gula merah pilihan sehingga menghasilkan kecap manis dengan cita rasa mantap, hitam dan kental.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 520 Ml<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0888...'),
(122, 'alfamart', 'Munik Bumbu Ayam Goreng 180 Gram', '7000', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 180 Gram<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nMunik Bumbu Ayam Goreng enak siap menjadikan resep ayam goreng keluarga kian lezat dan dinanti-nanti semuanya!. <br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 180 Gram<br />\r\n*Tidak ada bahan pengawet<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0888...'),
(123, 'alfamart', 'Greenfields Uht Milk Full Cream 125 Ml', '20000', 'kebutuhan bulanan', 'png', 'Kondisi: Baru<br />\r\nBerat : 125 Ml<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nSusu cair siap minum yang terbuat dari 100% susu sapi segar dengan kandungan vitamin dan mineral serta tinggi kalsium.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 125 Ml<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0888...<br />\r\n'),
(124, 'alfamart', 'Sasa Tepung Bumbu Serbaguna', '8500', 'kebutuhan bulanan', 'jpg', 'Kondisi: Baru<br />\r\nBerat : 225 Gram<br />\r\nKategori : Kebutuhan Bulanan<br />\r\nTepung bumbu serbaguna original sasa adalah tepung bumbu praktis cepat saji yang lezat dan lengkap sehingga tidak perlu di tambah bumbu lain.<br />\r\nKONDISI:<br />\r\n*Dikemas dengan rapi dan aman<br />\r\n*Pickup pengiriman bisa pakai Styrofoam box atau plastik<br />\r\nCatatan:<br />\r\n*Terima orderan setiap hari<br />\r\n*Pengiriman pagi-sore hari<br />\r\n*Minimal pemesanan 225 Gram<br />\r\n<br />\r\n*Info lebih lanjut bisa melalui WhatsApp : 0888...'),
(125, 'pasarpucung', 'Yoghurt Greenfields 500 Gram', '15000', 'menu diet', 'jpg', 'Sertifikat: Halal<br />\r\nKondisi: Baru<br />\r\nBerat: 50 Gram<br />\r\nKategori: Yogurt<br />\r\nEtalase: Yogurt<br />\r\nRasa :<br />\r\nPilihan Rasa :<br />\r\n<br />\r\n- Plain<br />\r\n- Strawberry<br />\r\n- Mango<br />\r\n- Blueberry<br />\r\n<br />\r\nWaktu proses khusus Yogurt 500ml +1-2 hari setelah order diterima.<br />\r\n<br />\r\nTerima kasih');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `keranjang_andari`
--
ALTER TABLE `keranjang_andari`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `keranjang_hanif`
--
ALTER TABLE `keranjang_hanif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `keranjang_ilyas`
--
ALTER TABLE `keranjang_ilyas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `keranjang_mumtaz`
--
ALTER TABLE `keranjang_mumtaz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `keranjang_radit`
--
ALTER TABLE `keranjang_radit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `keranjang_ramadhan`
--
ALTER TABLE `keranjang_ramadhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_ibfk_1` (`username_mitra`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keranjang_andari`
--
ALTER TABLE `keranjang_andari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keranjang_hanif`
--
ALTER TABLE `keranjang_hanif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `keranjang_ilyas`
--
ALTER TABLE `keranjang_ilyas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `keranjang_mumtaz`
--
ALTER TABLE `keranjang_mumtaz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keranjang_radit`
--
ALTER TABLE `keranjang_radit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `keranjang_ramadhan`
--
ALTER TABLE `keranjang_ramadhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang_andari`
--
ALTER TABLE `keranjang_andari`
  ADD CONSTRAINT `keranjang_andari_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `keranjang_hanif`
--
ALTER TABLE `keranjang_hanif`
  ADD CONSTRAINT `keranjang_hanif_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `keranjang_ilyas`
--
ALTER TABLE `keranjang_ilyas`
  ADD CONSTRAINT `keranjang_ilyas_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `keranjang_mumtaz`
--
ALTER TABLE `keranjang_mumtaz`
  ADD CONSTRAINT `keranjang_mumtaz_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `keranjang_radit`
--
ALTER TABLE `keranjang_radit`
  ADD CONSTRAINT `keranjang_radit_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `keranjang_ramadhan`
--
ALTER TABLE `keranjang_ramadhan`
  ADD CONSTRAINT `keranjang_ramadhan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `mitra_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`username_mitra`) REFERENCES `akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
