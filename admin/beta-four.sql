-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 01:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beta-four`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(20) NOT NULL,
  `Username` varchar(500) NOT NULL,
  `Password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Password`) VALUES
(1, 'admin@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(500) NOT NULL,
  `cat_img` varchar(500) NOT NULL,
  `cat_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_img`, `cat_desc`) VALUES
(38, 'Speakers', 'upload/IMG_0097.png', 'Designed and developed for higher performance and best sound quality for all occasion'),
(39, 'Portable Speakers System', 'upload/portables.png', 'Class D power amplifiers with its total power upto 500W provide tremendous sound pressure and incredible low-frequency impact.'),
(40, 'Digital Echoes', 'upload/Digital Presets.png', 'Two 15-band, 2/3-octave Constant Q frequency bands'),
(41, 'Line Array', 'upload/portables.png', 'Class D power amplifiers with its total power upto 500W provide tremendous sound pressure and incredible low-frequency impact.'),
(47, 'Mixing Console', 'upload/AX8NV3 front .png', 'Class D power amplifiers with its total power upto 500W provide tremendous sound pressure and incredible low-frequency impact.'),
(50, 'Columns', 'upload/IMG_0097.png', ' Designed and developed for higher performance and best sound quality for all occasion'),
(51, 'HF Drivers/ Driver Unit', 'upload/HF.png', ' Designed and developed for higher performance and best sound quality for all occasion'),
(52, 'Amplifier', 'upload/TD-8000 front high res.png', ' Designed and developed for higher performance and best sound quality for all occasion'),
(53, 'Microphones', 'upload/UTW-230.png', ' Designed and developed for higher performance and best sound quality for all occasion');

-- --------------------------------------------------------

--
-- Table structure for table `home-slider`
--

CREATE TABLE `home-slider` (
  `Id` int(255) NOT NULL,
  `image_url` text NOT NULL,
  `slider_title` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home-slider`
--

INSERT INTO `home-slider` (`Id`, `image_url`, `slider_title`) VALUES
(47, 'upload/amplifier-banner.jpg', 'sada'),
(48, 'upload/Banner-spk.jpg', 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_cat` varchar(1000) NOT NULL,
  `product_title` varchar(1000) NOT NULL,
  `product_qty` int(255) NOT NULL,
  `product_desc` mediumtext NOT NULL,
  `product_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_qty`, `product_desc`, `product_img`) VALUES
(18, 'Speakers', 'Speakers', 1, 'safdddfgdfvvc', 'upload/IMG_0093.png'),
(19, 'Speakers', 'Speaker', 1, 'ifsncxjcnzxczjxcjscsacsc', 'upload/IMG_0097.png'),
(20, 'Mixing Consoles', 'df', 5, 'sf', 'upload/Mixer-thumbnail-300x169-1.jpg'),
(21, 'Amplifiers', 'Amp', 3, 'dsjnsjdc', 'upload/amp-thumbnail-300x169-2.jpg'),
(22, 'Portable Speakers System', 'abc', 3, 'dfa', 'upload/TD-8000 front high res.png'),
(23, 'Digital Echoes', 'Speaker', 3, 'gzdsgdsgd', 'upload/Digital Presets.png'),
(24, 'Line Array', 'sfd', 5, 'gzdsgdsgd', 'upload/TD-8000 back .png'),
(25, 'Microphones', 'Speaker', 5, 'gzdsgdsgd', 'upload/p3.png'),
(26, 'Columns', 'Speaker', 5, 'sf', 'upload/TD-8000 front high res.png'),
(27, 'HF Drivers/ Driver Unit', 'fdas', 0, 'sasf', 'upload/HF.png'),
(28, 'Microphones', 'hi', 5, 'abc', 'upload/UTW-230.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `home-slider`
--
ALTER TABLE `home-slider`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `home-slider`
--
ALTER TABLE `home-slider`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
