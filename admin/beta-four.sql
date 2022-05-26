-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2022 at 07:17 AM
-- Server version: 5.7.38
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(39, 'Portable Speakers System', 'upload/portables.png', 'Class D power amplifiers with its total power upto 500W provide tremendous sound pressure and incredible low-frequency impact.'),
(40, 'Digital Echoes', 'upload/Digital Presets.png', 'Two 15-band, 2/3-octave Constant Q frequency bands'),
(41, 'Line Array', 'upload/portables.png', 'Class D power amplifiers with its total power upto 500W provide tremendous sound pressure and incredible low-frequency impact.'),
(52, 'Amplifier', 'upload/TD-8000 front high res.png', ' Designed and developed for higher performance and best sound quality for all occasion'),
(53, 'Microphones', 'upload/UTW-230.png', ' Designed and developed for higher performance and best sound quality for all occasion'),
(54, 'HF Drivers', 'upload/HF.png', ' Designed and developed for higher performance and best sound quality for all occasion'),
(55, 'Columns', 'upload/IMG_0282.png', ' Designed and developed for higher performance and best sound quality for all occasion');

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
(48, 'upload/Banner-spk.jpg', 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `new-release`
--

CREATE TABLE `new-release` (
  `id` int(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `qty` int(255) NOT NULL,
  `category` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new-release`
--

INSERT INTO `new-release` (`id`, `image`, `title`, `description`, `qty`, `category`) VALUES
(3, 'upload/HF.png', 'hf driver', 'saffsxv', 4, 'HF Drivers/ Driver Unit'),
(4, 'upload/TD-8000 front high res.png', 'abc', '<div>&lt;div class=\"mt-2 pr-3 content\"&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p&gt;All models in the product line are engineered to offer sound reinforcement professionals solutions to meet nearly any challenge. Each model is compatible with others, both mechanically and acoustically.</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Delivers premium-quality audio in performance.&lt;/p&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/div&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3 class=\"text-success\"&gt;Key Features&lt;/h3&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;div class=\"mt-2 pr-3 content\"&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;ul class=\"ml-4\"&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li&gt;HIGH PERFORMANCE&lt;/li&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li&gt;PRECISION COVERAGE&lt;/li&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li&gt;WIDE RANGE OF APPLICATIONS&lt;/li&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li&gt;PROGRESSIVE WAVEGUIDES&lt;/li&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li&gt;UNSURPASSED [B4] ENGINEERING&lt;/li&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li&gt;ADVANCED TECHNOLOGY COMPONENTS&lt;/li&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/ul&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/div&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;div&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;table border=\"2\" style=\"width: 100%;text-align: center;\"&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;tr style=\"background: lightcyan;\"&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;th&gt;SPECIFICATIONS&lt;/th&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;th&gt;18-EM1290&lt;/th&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;Nominal Diameter&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;18 Inch&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;Rated Impedance&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;8 Ohms&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;Power Capacity&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;1200Watts RMS&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;Sensitivity&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;96 dB&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;Frequency Range&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;35 &ndash; 1600 Hz&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;Voice Coil Diameter&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;4 Inch&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;Voice Coil Material&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;Til/Copper In/Out Winding&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;Magnet Size&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;220x120x25 mm&lt;/td&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;tr&gt;</div>\r\n<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;td&gt;Magnet Type&lt;', 1, 'Microphones');

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
(18, 'Line Array', 'fdsfs ', 43, '<p>asdkdakjsdx</p>\r\n<p>asdxklsx</p>\r\n<p>asnxzx</p>\r\n<p>anxm</p>', 'upload/IMG_0097.png'),
(19, 'Speakers', 'Speaker', 1, 'ifsncxjcnzxczjxcjscsacsc', 'upload/IMG_0097.png'),
(20, 'Mixing Consoles', 'df', 5, 'sf', 'upload/Mixer-thumbnail-300x169-1.jpg'),
(21, 'Amplifiers', 'Amp', 3, 'dsjnsjdc', 'upload/amp-thumbnail-300x169-2.jpg'),
(22, 'Portable Speakers System', 'abc', 3, 'dfa', 'upload/TD-8000 front high res.png'),
(23, 'Digital Echoes', 'Speaker', 3, 'gzdsgdsgd', 'upload/Digital Presets.png'),
(24, 'Line Array', 'sfd', 5, 'gzdsgdsgd', 'upload/TD-8000 back .png'),
(25, 'Microphones', 'Speaker', 5, 'gzdsgdsgd', 'upload/p3.png'),
(26, 'Columns', 'Speaker', 5, 'sf', 'upload/TD-8000 front high res.png'),
(27, 'HF Drivers/ Driver Unit', 'fdas', 0, 'sasf', 'upload/HF.png'),
(28, 'Microphones', 'hi', 5, 'abc', 'upload/UTW-230.png'),
(30, 'Columns', 'xcc', 0, 'cz', 'upload/col-thumbnail-300x169-1.jpg'),
(31, 'Columns', 'column', 3, 'sdsacjkcxkjz', 'upload/IMG_0282.png'),
(32, 'Amplifier', 'asf', 3, '<div class=\"mt-2 pr-3 content\">\r\n<p>All models in the product line are engineered to offer sound reinforcement professionals solutions to meet nearly any challenge. Each model is compatible with others, both mechanically and acoustically. Delivers premium-quality audio in performance.</p>\r\n</div>\r\n<h3 class=\"text-success\">Key Features</h3>\r\n<div class=\"mt-2 pr-3 content\">\r\n<ul class=\"ml-4\">\r\n<li>HIGH PERFORMANCE</li>\r\n<li>PRECISION COVERAGE</li>\r\n<li>WIDE RANGE OF APPLICATIONS</li>\r\n<li>PROGRESSIVE WAVEGUIDES</li>\r\n<li>UNSURPASSED [B4] ENGINEERING</li>\r\n<li>ADVANCED TECHNOLOGY COMPONENTS</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<table border=\"2\">\r\n<tbody>\r\n<tr>\r\n<th>SPECIFICATIONS</th>\r\n<th>18-EM1290</th>\r\n</tr>\r\n<tr>\r\n<td>Nominal Diameter</td>\r\n<td>18 Inch</td>\r\n</tr>\r\n<tr>\r\n<td>Rated Impedance</td>\r\n<td>8 Ohms</td>\r\n</tr>\r\n<tr>\r\n<td>Power Capacity</td>\r\n<td>1200Watts RMS</td>\r\n</tr>\r\n<tr>\r\n<td>Sensitivity</td>\r\n<td>96 dB</td>\r\n</tr>\r\n<tr>\r\n<td>Frequency Range</td>\r\n<td>35 &ndash; 1600 Hz</td>\r\n</tr>\r\n<tr>\r\n<td>Voice Coil Diameter</td>\r\n<td>4 Inch</td>\r\n</tr>\r\n<tr>\r\n<td>Voice Coil Material</td>\r\n<td>Til/Copper In/Out Winding</td>\r\n</tr>\r\n<tr>\r\n<td>Magnet Size</td>\r\n<td>220x120x25 mm</td>\r\n</tr>\r\n<tr>\r\n<td>Magnet Type</td>\r\n<td>Ferrite</td>\r\n</tr>\r\n<tr>\r\n<td>Frame</td>\r\n<td>Aluminium Casting</td>\r\n</tr>\r\n<tr>\r\n<td>Cone Type</td>\r\n<td>Pulp Paper</td>\r\n</tr>\r\n<tr>\r\n<td>Dual/Dust Cap</td>\r\n<td>Pulp Paper</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><span class=\"text-danger\">Categories:</span>&nbsp;New Release, Speakers Tag: Power Amplifier</p>\r\n</div>', 'upload/TD-8000 front high res.png'),
(33, 'Mixing Console', 'ABC', 3, '', 'upload/amp-thumbnail-300x169-2.jpg'),
(34, 'Portable Speakers System', 'sfa', 2, '', 'upload/portable-speaker-sys-thumbnail-300x169-1.jpg');

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
-- Indexes for table `new-release`
--
ALTER TABLE `new-release`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `home-slider`
--
ALTER TABLE `home-slider`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `new-release`
--
ALTER TABLE `new-release`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
