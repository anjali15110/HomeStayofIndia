-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 05:28 AM
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
-- Database: `homestay`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `room_quantity` int(50) NOT NULL,
  `price` mediumint(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `total_price` int(20) NOT NULL,
  `status` int(11) NOT NULL,
  `createddate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `hotel_id`, `check_in`, `check_out`, `room_quantity`, `price`, `discount`, `total_price`, `status`, `createddate`) VALUES
(1, 3, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 799, '10', 1578, 1, 2023),
(2, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 999, '20', 1958, 1, 2023),
(3, 3, 1, '2023-06-21 00:00:00', '2023-06-29 00:00:00', 3, 999, '20', 999, 1, 2023),
(4, 3, 1, '2023-06-21 00:00:00', '2023-06-29 00:00:00', 3, 999, '20', 999, 1, 2023),
(5, 3, 10, '2023-06-22 00:00:00', '2023-07-05 00:00:00', 7, 899, '10', 6223, 1, 2023),
(6, 3, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 899, '', 1778, 1, 2023),
(7, 3, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 899, '', 2667, 1, 2023),
(8, 3, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 899, '', 2667, 1, 2023),
(9, 3, 10, '2023-06-21 00:00:00', '2023-06-29 00:00:00', 2, 899, '20', 1778, 1, 2023),
(10, 3, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 899, '', 899, 1, 2023),
(11, 3, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 899, '10', 1778, 1, 2023),
(12, 3, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 899, '10', 1778, 1, 2023),
(13, 3, 1, '2023-06-26 00:00:00', '2023-06-30 00:00:00', 4, 999, '20', 999, 1, 2023),
(14, 3, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2000, '100', 2000, 1, 2023),
(15, 3, 8, '2023-06-30 00:00:00', '2023-07-07 00:00:00', 1, 2000, '100', 1900, 1, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_image` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_image`, `status`, `createddate`) VALUES
(1, 'KAROL BAGH', 'category-2023-06-05-6730.jpg', 1, '2023-06-05 00:00:00'),
(2, 'PAHARGENJ', 'category-2023-06-05-8856.jpg', 1, '2023-06-05 00:00:00'),
(3, 'JANAKPURI', 'category-2023-06-05-8171.jpg', 1, '2023-06-05 00:00:00'),
(4, 'DWARKA', 'category-2023-06-05-2877.jpg', 1, '2023-06-05 00:00:00'),
(5, 'ROHINI', 'category-2023-06-05-6008.jpg', 1, '2023-06-05 00:00:00'),
(6, 'SAKET', 'category-2023-06-06-4594.jpg', 1, '2023-06-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `company`, `phone`, `message`, `status`, `createddate`) VALUES
(1, 'anjali', 'anjali@gmail.com', 'pcti', 8240734614, 'hjbghfcjkshjhgkjdsfhnlsdjbhlfjhl', 1, '2023-06-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `hotel_address` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `amenities` varchar(200) NOT NULL,
  `policies` varchar(500) NOT NULL,
  `price` bigint(20) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `area` varchar(20) NOT NULL,
  `imagea` varchar(500) NOT NULL,
  `imageb` varchar(500) NOT NULL,
  `imagec` varchar(500) NOT NULL,
  `imaged` varchar(500) NOT NULL,
  `imagee` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `category_id`, `hotel_name`, `hotel_address`, `description`, `amenities`, `policies`, `price`, `discount`, `area`, `imagea`, `imageb`, `imagec`, `imaged`, `imagee`, `status`, `createddate`) VALUES
(1, '1', 'Hotel Sun City', 'Plot No 11a-34, W.e.a, Channa Market, Karol Bagh, Delhi ', 'Did you know that we’ve got 2.5 Crore bookings since March 2020? And this is all thanks to the sanitisation & safety measures followed at our properties, from disinfecting surfaces with high-quality cleaning products and maintaining social distance to using protective gear and more.', '1,2,4,6,7', '<ul>\n	<li>\n	<p>Couples are welcome</p>\n	</li>\n	<li>\n	<p>Guests can check in using any local or outstation ID proof (PAN card not accepted).</p>\n	</li>\n	<li>\n	<p>As a complimentary benefit, your stay is now insured by Acko.</p>\n	</li>\n	<li>\n	<p>This hotel is serviced under the trade name of Hotel Sun City as per quality standards of OYO</p>\n	</li>\n</ul>\n', 999, '20', '194 sqft', 'shortimage_a-2023-06-13-7483.jpg', 'shortimage_b-2023-06-13-5950.jpg', 'shortimage_c-2023-06-13-4638.jpg', 'shortimage_d-2023-06-13-1040.jpg', 'shortimage_e-2023-06-13-2728.jpg', 1, '2023-06-13 00:00:00'),
(8, '1', 'Townhouse 610 Derawal Nagar', 'A-330, Lala Achintaram Marg, Derawal Nagar, Delhi', 'Did you know that we’ve got 2.5 Crore bookings since March 2020? And this is all thanks to the sanitisation & safety measures followed at our properties, from disinfecting surfaces with high-quality cleaning products and maintaining social distance to using protective gear and more.', '1,2,5,6,8,9', '<ul>\n	<li>\n	<p>Couples are welcome</p>\n	</li>\n	<li>\n	<p>Guests can check in using any local or outstation ID proof (PAN card not accepted).</p>\n	</li>\n	<li>\n	<p>Only Indian Nationals allowed</p>\n	</li>\n	<li>\n	<p>As a complimentary benefit, your stay is now insured by Acko.</p>\n	</li>\n	<li>\n	<p>This hotel is serviced under the trade name of Super OYO Townhouse 610 Derawal Nagar as per quality standards of OYO</p>\n	</li>\n</ul>\n', 2000, '100', '200 sqft', 'shortimage_a-2023-06-13-7279.jpg', 'shortimage_b-2023-06-13-3406.jpg', 'shortimage_c-2023-06-13-6626.jpg', 'shortimage_d-2023-06-13-5659.jpg', 'shortimage_e-2023-06-13-4843.jpg', 1, '2023-06-13 00:00:00'),
(9, '2', 'Flagship 812397 Hotel Delhi Empire Palace', '8668 Desh Bandhu Gupta Road, Arya Nagar, Delhi', 'Affordable hotels at prime location.', '1,2,3,4,7', '<ul>\n	<li>\n	<p>Couples are welcome</p>\n	</li>\n	<li>\n	<p>Guests can check in using any local or outstation ID proof (PAN card not accepted).</p>\n	</li>\n	<li>\n	<p>As a complimentary benefit, your stay is now insured by Acko.</p>\n	</li>\n	<li>\n	<p>This hotel is serviced under the trade name of Hotel Delhi Empire Palace as per quality standards of OYO</p>\n	</li>\n</ul>\n', 799, '10', '120 sqft', 'shortimage_a-2023-06-15-6150.jpg', 'shortimage_b-2023-06-15-1444.jpg', 'shortimage_c-2023-06-15-6618.jpg', 'shortimage_d-2023-06-15-9712.jpg', 'shortimage_e-2023-06-15-9742.jpg', 1, '2023-06-15 00:00:00'),
(10, '2', 'Flagship Hotel Vandana Inn', 'Plot No 45, Arya Nagar, Aarakashan Road (near Delhi Railway Station), Delhi', 'Did you know that we’ve got 2.5 Crore bookings since March 2020? And this is all thanks to the sanitisation & safety measures followed at our properties, from disinfecting surfaces with high-quality cleaning products and maintaining social distance to using protective gear and more.', '1,2,10', '<ul>\n	<li>\n	<p>Couples are welcome</p>\n	</li>\n	<li>\n	<p>Guests can check in using any local or outstation ID proof (PAN card not accepted).</p>\n	</li>\n	<li>\n	<p>As a complimentary benefit, your stay is now insured by Acko.</p>\n	</li>\n	<li>\n	<p>This hotel is serviced under the trade name of Hotel Vandana Inn as per quality standards of OYO</p>\n	</li>\n</ul>\n', 899, '10', '150 sqft', 'shortimage_a-2023-06-15-5972.jpg', 'shortimage_b-2023-06-15-2150.jpg', 'shortimage_c-2023-06-15-7224.jpg', 'shortimage_d-2023-06-15-5602.jpg', 'shortimage_e-2023-06-15-3215.jpg', 1, '2023-06-15 00:00:00'),
(11, '3', 'Townhouse 281 Harsh Vihar. Near M2K Cinemas Rohini', 'Pitampura, Delhi India, Delhi', 'Did you know that we’ve got 2.5 Crore bookings since March 2020? And this is all thanks to the sanitisation & safety measures followed at our properties, from disinfecting surfaces with high-quality cleaning products and maintaining social distance to using protective gear and more.', '1,2,6,7', '<ul>\n	<li>\n	<p>Couples are welcome</p>\n	</li>\n	<li>\n	<p>Guests can check in using any local or outstation ID proof (PAN card not accepted).</p>\n	</li>\n	<li>\n	<p>Only Indian Nationals allowed</p>\n	</li>\n	<li>\n	<p>As a complimentary benefit, your stay is now insured by Acko.</p>\n	</li>\n	<li>\n	<p>This hotel is serviced under the trade name of TOWNHOUSE 281 HARSH VIHAR. as per quality standards of OYO</p>\n	</li>\n</ul>\n', 2899, '100', '300 sqft', 'shortimage_a-2023-06-15-8317.jpg', 'shortimage_b-2023-06-15-1715.jpg', 'shortimage_c-2023-06-15-4991.jpg', 'shortimage_d-2023-06-15-5365.jpg', 'shortimage_e-2023-06-15-5222.jpg', 1, '2023-06-15 00:00:00'),
(14, '4', 'Flagship 813940 Grand Vitara Dwarka', 'plot number 333 gali number 40 Gali Number 40, Vipin Garden extension ,Dwarka Mor , New delhi 110059', 'Affordable hotels at prime location.', '1,2,3,4,7', '<ul>\n	<li>\n	<p>Couples are welcome</p>\n	</li>\n	<li>\n	<p>Guests can check in using any local or outstation ID proof (PAN card not accepted).</p>\n	</li>\n	<li>\n	<p>As a complimentary benefit, your stay is now insured by Acko.</p>\n	</li>\n	<li>\n	<p>This hotel is serviced under the trade name of Grand Vitara Dwarka as per quality standards of OYO</p>\n	</li>\n</ul>\n', 663, '10', '200 sqft', 'shortimage_a-2023-06-16-4566.jpg', 'shortimage_b-2023-06-16-3637.jpg', 'shortimage_c-2023-06-16-9235.jpg', 'shortimage_d-2023-06-16-5347.jpg', 'shortimage_e-2023-06-16-9850.jpg', 1, '2023-06-16 00:00:00'),
(15, '5', 'Super OYO Flagship SK Residency Rohini Near Rithala Metro Station', 'Mange Ram Park Extension Rohini Sector 23, Delhi', 'Affordable hotels at prime location.', '1,2,4,6,7', '<ul>\n	<li>\n	<p>Couples are welcome</p>\n	</li>\n	<li>\n	<p>Guests can check in using any local or outstation ID proof (PAN card not accepted).</p>\n	</li>\n	<li>\n	<p>As a complimentary benefit, your stay is now insured by Acko.</p>\n	</li>\n	<li>\n	<p>This hotel is serviced under the trade name of SK Residency Rohini as per quality standards of OYO</p>\n	</li>\n</ul>\n', 999, '20', '134 sqft', 'shortimage_a-2023-06-16-4479.jpg', 'shortimage_b-2023-06-16-2507.jpg', 'shortimage_c-2023-06-16-2126.jpg', 'shortimage_d-2023-06-16-6209.jpg', 'shortimage_e-2023-06-16-6216.jpg', 1, '2023-06-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `iconname` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `icon`, `iconname`, `status`, `createddate`) VALUES
(1, 'fa-solid fa-wifi', 'Wifi', 1, '2023-06-13 00:00:00'),
(2, 'fa-solid fa-display', 'TV', 1, '2023-06-13 00:00:00'),
(3, 'fa-solid fa-glass-water-droplet', 'Geyser', 1, '2023-06-13 00:00:00'),
(4, 'fa-solid fa-car-battery', 'Power backup', 1, '2023-06-13 00:00:00'),
(5, 'fa-regular fa-credit-card', 'Card payment', 1, '2023-06-13 00:00:00'),
(6, 'fa-regular fa-circle-check', 'Reception', 1, '2023-06-13 00:00:00'),
(7, 'fa-solid fa-elevator', 'Elevator', 1, '2023-06-13 00:00:00'),
(8, 'fa-solid fa-kitchen-set', 'Kitchen', 1, '2023-06-13 00:00:00'),
(9, 'fa-solid fa-couch', 'Seating area', 1, '2023-06-13 00:00:00'),
(10, 'fa-solid fa-bed', 'Queen Sized Bed', 1, '2023-06-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `createddate` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `city`, `state`, `pincode`, `password`, `status`, `createddate`, `type`) VALUES
(1, 'neha', 'neha@gmail.com', 8787899790, 'ghaziabad', 'up', 201102, 'neha@123', 1, 0, 1),
(2, 'aman', 'aman@gmail.com', 887060650, 'gzb', 'up', 201102, 'aman@123', 1, 2023, 1),
(3, 'anjali', 'anjali@gmail.com', 890089606, 'gzb', 'up', 201102, 'anjali@123', 1, 2023, 1),
(4, 'ananya', 'ananya@gmail.com', 870970870, 'gzb', 'up', 201102, 'ananya', 1, 2023, 0),
(5, 'darpan', 'darpan@gmail.com', 7608760760, 'gzb', 'up', 201102, 'darpan', 1, 2023, 0),
(6, 'anjali kashyap', 'anjalikashyap15112000@gmail.com', 8130764614, 'GZB', 'UP', 201102, 'Anjali@123', 1, 2023, 0),
(7, '', '', 0, '', '', 0, '', 1, 2023, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
