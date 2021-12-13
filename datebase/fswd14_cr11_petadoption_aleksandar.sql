-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 04:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fswd14_cr11_petadoption_aleksandar`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` varchar(10) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `age` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `picture`, `location`, `description`, `size`, `hobby`, `breed`, `age`) VALUES
(46, 'Arow', '61b6aee585493.jpg', 'Stephanplatz 2, Vienna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer efficitur fermentum neque vitae venenatis. Nam tincidunt vel diam vitae euismod. Praesent luctus vitae metus non fermentum. Praesent vel rhoncus odio, eget commodo libero. In et magna elit. ', 'Small', 'Running, swimming, jumping, sniffing, eating, rolling, lounging, playing, posing', 'Frenchie', '5'),
(47, 'Charlie', '61b6aeac7f18c.jpg', 'Stephanplatz 3, Vienna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer efficitur fermentum neque vitae venenatis. Nam tincidunt vel diam vitae euismod. Praesent luctus vitae metus non fermentum. Praesent vel rhoncus odio, eget commodo libero. In et magna elit.', 'Small', 'Running, swimming, jumping, sniffing, eating, rolling, lounging, playing, posing', 'Cocker spaniel', '10'),
(48, 'Bailey', '61b6af3be5e95.jpg', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer efficitur fermentum neque vitae venenatis. Nam tincidunt vel diam vitae euismod. Praesent luctus vitae metus non fermentum. Praesent vel rhoncus odio, eget commodo libero. In et magna elit. ', 'large', 'Running, swimming, jumping, sniffing, eating, rolling, lounging, playing, posing', 'Canine', '11'),
(49, 'Jake', '61b6afdd3dda1.jpg', 'Stephanplatz 5, Vienna', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volupta', 'Small', 'sleeping, running', 'Mammal', '1'),
(50, 'Bailey', '61b6b05299a54.jpg', 'Stephanplatz 5, Vienna', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volupta', 'Large', 'Running, swimming, jumping, sniffing, eating, rolling, lounging, playing, posing', 'Weimaraner', '8'),
(51, 'Lily', '61b6b0e061665.jpg', 'Stephanplatz 6, Vienna', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volupta', 'Small', 'Running, swimming, jumping, sniffing, eating, rolling, lounging, playing, posing', 'Lhasa Apso', '5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `picture`, `password`, `status`) VALUES
(39, 'John', 'Doe', 'user@mail.com', '0660100100', 'Stephanplatz 1,Wien 1100,Austria, ', '61b6adc3ed899.png', '123123', 'user'),
(40, 'John ', 'Doe Doe', 'admin@mail.com', '0660100100', 'Stephanplatz 2,\r\nWien 1100,\r\nAustria, ', '', '123123', 'adm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
