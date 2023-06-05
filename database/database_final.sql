-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 10:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id_user` int(11) NOT NULL,
  `kode_user` varchar(25) NOT NULL,
  `nis` char(20) NOT NULL,
  `fullname` varchar(125) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `verif` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `join_date` varchar(125) NOT NULL,
  `terakhir_login` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_user`, `kode_user`, `nis`, `fullname`, `username`, `password`, `kelas`, `alamat`, `verif`, `role`, `join_date`, `terakhir_login`) VALUES
(1, '-', '-', 'Administrator', 'admin', 'admin', '-', '-', 'Iya', 'Admin', '04-05-2021', '03-06-2023 ( 16:00:39 )'),
(2, '-', '-', 'tasya nafisah', 'tasyanafisah02', 'tasya123', '-', '-', 'Iya', 'Admin', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Rick Riordan'),
(2, 'J.K. Rowling'),
(3, 'Nicholas Sparks'),
(4, 'R.L. Stine'),
(5, 'Stephen Hawkings');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `stock` tinyint(1) NOT NULL DEFAULT 1,
  `year_published` varchar(125) NOT NULL,
  `isbn` int(50) NOT NULL,
  `publisher_id` int(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `description`, `category_id`, `cover`, `file`, `stock`, `year_published`, `isbn`, `publisher_id`) VALUES
(1, 'Percy Jackson & The Olympians: The Lightning Thief', 1, 'Percy, who has dyslexia, is surprised to discover that he is a demigod. When he is accused of stealing Zeus\'s lightning bolt, he sets off to find the bolt and settle the fight between the gods.', 3, '647ae7e68cb9f8.00699454.jpg', '647ae7e68d1801.95925762.pdf', 0, '', 0, 1),
(2, 'Harry Potter and the Philosopher\'s Stone', 2, 'Harry Potter and the Philosopher\'s Stone is a fantasy novel written by British author J. K. Rowling.', 5, '647af458a9ab10.47448644.jpg', '647af458aa3218.47369291.pdf', 1, '', 0, 0),
(3, 'A Walk To Remember', 3, 'A Walk to Remember is a novel by American writer Nicholas Sparks, released in October 1999. The novel, set in 1958–1959 in Beaufort, North Carolina, is a story of two teenagers who fall in love with each other despite the disparity of their personalities. A Walk to Remember is adapted in the film of the same name.', 1, '647af54352b6b8.58897426.jpeg', '647af54352d3c6.32675567.pdf', 1, '', 0, 0),
(4, 'Night of the Living Dummy', 4, 'Kris\'s twin sister has just gotten a ventriloquist\'s dummy and it\'s all anyone - their parents, their friends - seem to care about. Kris is tired of being ignored so she gets a dummy of her own. But double the dummies start to mean double the trouble...and horror.', 2, '647afab525dff2.18389422.jpg', '647afab52653a8.37565108.pdf', 1, '', 0, 0),
(5, 'A Brief History of Time', 5, 'A Brief History of Time: From the Big Bang to Black Holes is a book on theoretical cosmology by English physicist Stephen Hawking. It was first published in 1988. Hawking wrote the book for readers who had no prior knowledge of physics.', 4, '647b0099969135.27429310.jpg', '647b0099970d77.18967047.pdf', 1, '', 0, 0),
(6, 'Percy Jackson & The Olympians: The Last Olympian', 1, 'The Last Olympian is a fantasy-adventure novel based on Greek mythology by Rick Riordan, published on May 5, 2009. It is the fifth and final novel of the Percy Jackson & the Olympians series and serves as the direct sequel to The Battle of the Labyrinth.', 3, '647b110c878bc3.50474304.jpg', '647b110c87fe72.60437938.pdf', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Romance'),
(2, 'Horror'),
(3, 'Adventure'),
(4, 'Non Fiction'),
(5, 'Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `identity`
--

CREATE TABLE `identity` (
  `id_identitas` int(11) NOT NULL,
  `nama_app` varchar(50) NOT NULL,
  `alamat_app` text NOT NULL,
  `email_app` varchar(125) NOT NULL,
  `nomor_hp` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `identity`
--

INSERT INTO `identity` (`id_identitas`, `nama_app`, `alamat_app`, `email_app`, `nomor_hp`) VALUES
(1, 'Lib.io', 'Yogyakarta', 'contact@lib.io.com', '08123456789');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `username`, `password`, `isadmin`) VALUES
(8, 'putriayu', 'putriayu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id_penerbit` int(11) NOT NULL,
  `kode_penerbit` varchar(125) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `verif_penerbit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id_penerbit`, `kode_penerbit`, `nama_penerbit`, `verif_penerbit`) VALUES
(1, '', 'Gramedia Pustaka Utama', ''),
(2, '', 'Erlangga', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_books` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_books`, `id_user`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(1, 3, 1, '2023-06-23', '2023-06-30', 'kembali'),
(2, 3, 1, '2023-06-10', '2023-06-17', 'kembali'),
(3, 4, 1, '2023-06-07', '2023-06-14', 'kembali'),
(4, 6, 1, '2023-06-15', '2023-06-22', 'kembali'),
(5, 3, 1, '2023-06-08', '2023-06-15', 'kembali'),
(6, 5, 1, '2023-06-06', '2023-06-13', 'kembali'),
(7, 5, 2, '2023-06-09', '2023-06-16', 'kembali'),
(8, 5, 2, '2023-06-08', '2023-06-15', 'kembali'),
(9, 3, 2, '2023-06-10', '2023-06-17', 'pinjam'),
(10, 4, 4, '2023-06-03', '2023-06-10', 'kembali'),
(11, 3, 4, '2023-06-04', '2023-06-11', 'kembali'),
(12, 4, 4, '2023-06-04', '2023-06-11', 'kembali'),
(13, 4, 4, '2023-06-04', '2023-06-11', 'kembali'),
(14, 3, 7, '2023-06-14', '2023-06-21', 'kembali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `identity`
--
ALTER TABLE `identity`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
