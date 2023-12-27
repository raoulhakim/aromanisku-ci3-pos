-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 11:34 AM
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
(1, 'Haidar', 'L', '09530140608', 'Sukabumi, Jawa Barat', '2023-12-21 20:12:08', '0000-00-00 00:00:00'),
(4, 'Akram', 'L', '089765654343', 'Sukabumi, Jawa Barat', '2023-12-25 16:30:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transactions`
--

CREATE TABLE `tb_detail_transactions` (
  `id_d_transaction` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `name_item` varchar(100) NOT NULL,
  `price_item` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `image_item` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_items`
--

INSERT INTO `tb_items` (`id_item`, `barcode_item`, `name_item`, `id_category`, `id_unit`, `price_item`, `stock_item`, `image_item`, `created_at`, `updated_at`) VALUES
(1, 'A001', 'Bakso Bolu', 3, 3, 15000, 0, NULL, '2023-12-23 06:00:13', '0000-00-00 00:00:00'),
(2, 'A002', 'Mie Ayam', 4, 4, 19000, 15, NULL, '2023-12-23 06:06:52', '0000-00-00 00:00:00'),
(3, 'A003', 'ABCD', 3, 3, 5000, 0, NULL, '2023-12-23 13:39:14', '0000-00-00 00:00:00'),
(11, 'A004', 'Manisan', 3, 4, 10000, 0, NULL, '2023-12-23 14:09:39', NULL),
(12, 'A005', 'Balado Akusuka', 3, 4, 6000, 0, NULL, '2023-12-23 14:11:12', NULL),
(13, 'SKDF1', 'Keripik', 3, 4, 4000, 0, NULL, '2023-12-23 14:13:50', NULL),
(17, 'AIKLK', 'ALKALIN', 4, 4, 123123123, 0, NULL, '2023-12-23 18:28:09', NULL),
(18, 'A010', 'Bakso Boraks', 3, 3, 5000, 0, NULL, '2023-12-26 05:02:31', NULL);

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
-- Table structure for table `tb_stocks`
--

CREATE TABLE `tb_stocks` (
  `id_stock` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `type_stock` enum('in','out') NOT NULL,
  `detail_stock` varchar(200) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_stocks`
--

INSERT INTO `tb_stocks` (`id_stock`, `id_item`, `type_stock`, `detail_stock`, `id_supplier`, `qty`, `date`, `created_at`, `id_user`) VALUES
(13, 2, 'in', 'Tambahan Bahan', 1, 20, '2023-12-24', '2023-12-24 20:44:28', 1),
(16, 2, 'out', 'Rusak', NULL, 5, '2023-12-24', '2023-12-24 20:45:22', 1);

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
(2, 'Akuwusi', '089511223344', 'Bandung, Jawa Barat', 'Ini mah test supplier', '2023-12-21 15:03:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transactions`
--

CREATE TABLE `tb_transactions` (
  `id_transaction` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `date_transaction` datetime NOT NULL DEFAULT current_timestamp(),
  `total_transaction` int(11) NOT NULL,
  `cash_transaction` int(11) NOT NULL,
  `change_transaction` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transactions`
--

INSERT INTO `tb_transactions` (`id_transaction`, `nama_user`, `nama_customer`, `date_transaction`, `total_transaction`, `cash_transaction`, `change_transaction`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '', '2023-12-26 00:00:00', 19000, 20000, 1000, '2023-12-26 08:52:57', NULL);

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
-- Indexes for table `tb_detail_transactions`
--
ALTER TABLE `tb_detail_transactions`
  ADD PRIMARY KEY (`id_d_transaction`),
  ADD KEY `id_transaction` (`id_transaction`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `tb_items`
--
ALTER TABLE `tb_items`
  ADD PRIMARY KEY (`id_item`),
  ADD UNIQUE KEY `barcode_item` (`barcode_item`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_unit` (`id_unit`);

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
-- Indexes for table `tb_stocks`
--
ALTER TABLE `tb_stocks`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_suppliers`
--
ALTER TABLE `tb_suppliers`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_transactions`
--
ALTER TABLE `tb_transactions`
  ADD PRIMARY KEY (`id_transaction`);

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_detail_transactions`
--
ALTER TABLE `tb_detail_transactions`
  MODIFY `id_d_transaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_items`
--
ALTER TABLE `tb_items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT for table `tb_stocks`
--
ALTER TABLE `tb_stocks`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_suppliers`
--
ALTER TABLE `tb_suppliers`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_transactions`
--
ALTER TABLE `tb_transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transactions`
--
ALTER TABLE `tb_detail_transactions`
  ADD CONSTRAINT `tb_detail_transactions_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `tb_transactions` (`id_transaction`),
  ADD CONSTRAINT `tb_detail_transactions_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `tb_items` (`id_item`);

--
-- Constraints for table `tb_items`
--
ALTER TABLE `tb_items`
  ADD CONSTRAINT `tb_items_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `tb_p_categories` (`id_category`),
  ADD CONSTRAINT `tb_items_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `tb_p_units` (`id_unit`);

--
-- Constraints for table `tb_stocks`
--
ALTER TABLE `tb_stocks`
  ADD CONSTRAINT `tb_stocks_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `tb_items` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_stocks_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tb_suppliers` (`id_supplier`),
  ADD CONSTRAINT `tb_stocks_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
