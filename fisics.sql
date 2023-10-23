-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 06:04 AM
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
-- Database: `fisics`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `nome` varchar(155) NOT NULL,
  `data_cad` datetime(6) NOT NULL,
  `conteudo` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `nome`, `data_cad`, `conteudo`) VALUES
(3, 'admin', '2023-06-21 09:08:09.000000', 'teste'),
(4, 'admin', '2023-06-26 00:18:09.000000', 'hjshshshshjdjaficiciciciaq64363'),
(5, 'aslann', '2023-06-26 00:18:35.000000', 'popopopyurryurr');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `result` int(11) NOT NULL,
  `data_cad` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(155) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `data_cad` datetime(6) NOT NULL,
  `admin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nome`, `senha`, `data_cad`, `admin`) VALUES
(1, 'admin', '$2y$10$UHW0G7m2YTeOhSNxIrefCeRCf7y.WtCN0gPeV6TLQp6dlidqugu6S', '0000-00-00 00:00:00.000000', 1),
(5, 'x', '$2y$10$UOwDJHx57y5KxuHGl8ZbU.V7egfR/j9afIkbE/Z6CqfuVoO94ws/O', '2023-06-20 20:45:24.000000', 0),
(7, 'aslann', '$2y$10$U0z..0mANl85qL0WeU3w3etx8sRez4twXVrebfrF1LEa4DySlsxei', '2023-06-20 23:11:53.000000', 0),
(8, 'user1', '$2y$10$FDLxrxpi484AS/xoh6GyFewOk8uznPj1rxPOqHU6ZjR7Z1WWfrH5i', '2023-06-21 09:03:47.000000', 0),
(9, 'owls@gmail.com', '$2y$10$zY6FoGSWNcT.vB2pQWENvu/nOnialpLyyvXTTNoOtdoSK5USGKoXu', '2023-06-26 00:47:38.000000', 0),
(10, 'owls', '$2y$10$mvdxJUjtz2w56LRSny1VteY7GphBiok0BteyudFIFm5UqsOPoxX76', '2023-06-26 00:48:07.000000', 0),
(11, 'guilherme', '$2y$10$SR462.QJBKnHyQUTzEbHcugCtg8jO27hhQVaekbak4BrBHwFpnLHe', '2023-06-26 00:49:11.000000', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
