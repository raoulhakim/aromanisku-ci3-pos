-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 06:24 AM
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
-- Database: `aromanisku-ci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_customers`
--

CREATE TABLE `tb_customers` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `jenis_kelamin_customer` enum('L','P') NOT NULL,
  `no_hp_customer` varchar(15) NOT NULL,
  `alamat_customer` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_customers`
--

INSERT INTO `tb_customers` (`id_customer`, `nama_customer`, `jenis_kelamin_customer`, `no_hp_customer`, `alamat_customer`, `created_at`, `updated_at`) VALUES
(1, 'Haidar', 'L', '09530140608', 'Sukabumi, Jawa Barat', '2023-12-21 20:12:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_items`
--

CREATE TABLE `tb_items` (
  `id_item` int(11) NOT NULL,
  `barcode_item` varchar(100) DEFAULT NULL,
  `name_item` varchar(100) DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `price_item` int(11) DEFAULT NULL,
  `stock_item` int(10) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_p_categories`
--

CREATE TABLE `tb_p_categories` (
  `id_category` int(11) NOT NULL,
  `nama_category` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_p_categories`
--

INSERT INTO `tb_p_categories` (`id_category`, `nama_category`, `created_at`, `updated_at`) VALUES
(3, 'Bolu', '2023-12-21 21:54:54', '0000-00-00 00:00:00'),
(4, 'Aromanis', '2023-12-21 22:10:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_p_units`
--

CREATE TABLE `tb_p_units` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_p_units`
--

INSERT INTO `tb_p_units` (`id_unit`, `nama_unit`, `created_at`, `updated_at`) VALUES
(3, 'Kilogram', '2023-12-21 21:54:54', '0000-00-00 00:00:00'),
(4, 'Satuan', '2023-12-21 22:10:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suppliers`
--

CREATE TABLE `tb_suppliers` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `no_hp_supplier` varchar(15) NOT NULL,
  `alamat_supplier` varchar(200) NOT NULL,
  `deskripsi_supplier` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_suppliers`
--

INSERT INTO `tb_suppliers` (`id_supplier`, `nama_supplier`, `no_hp_supplier`, `alamat_supplier`, `deskripsi_supplier`, `created_at`, `updated_at`) VALUES
(1, 'Haidar', '089530140608', 'Perum Pesona Pamoyanan, Blok E, Nomor 3, Kab. Sukabumi', 'Pembuat aplikasi POS AromanisKU', '2023-12-21 15:02:08', NULL),
(2, 'Akuwusi', '089511223344', 'Bandung, Jawa Barat', 'Ini mah test supplier', '2023-12-21 15:03:01', NULL),
(4, 'Toko B', '089657846273', 'Sukabumi, Jawa Barat', '1', '2023-12-21 18:36:59', NULL),
(6, 'Toko C', '02238465', 'Baleendah, Bandung, Jawa Barat', 'Toko Bangunan', '2023-12-21 18:42:58', NULL),
(7, 'Toko D', '089468343412', 'Sukaraja, Sukabumi, Jawa Barat', 'D Toko', '2023-12-21 18:43:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `alamat_user` varchar(200) DEFAULT NULL,
  `level_user` int(1) NOT NULL COMMENT '1:admin 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `password`, `nama_user`, `alamat_user`, `level_user`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'Bandung, Jawa Barat', 1),
(2, 'hisaki', '425af12a0743502b322e93a015bcf868e324d56a', 'Maeno Hisaki', 'Bandung, Jawa Barat', 2),
(5, 'sekiroiscool', '425af12a0743502b322e93a015bcf868e324d56a', 'Sekiro', '', 1),
(6, 'testingdiubah', '425af12a0743502b322e93a015bcf868e324d56a', 'Testing', 'Kebonpedes, Sukabumi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_customers`
--
ALTER TABLE `tb_customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_items`
--
ALTER TABLE `tb_items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `tb_p_categories`
--
ALTER TABLE `tb_p_categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tb_p_units`
--
ALTER TABLE `tb_p_units`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `tb_suppliers`
--
ALTER TABLE `tb_suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_customers`
--
ALTER TABLE `tb_customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_items`
--
ALTER TABLE `tb_items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_p_categories`
--
ALTER TABLE `tb_p_categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_p_units`
--
ALTER TABLE `tb_p_units`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_suppliers`
--
ALTER TABLE `tb_suppliers`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
