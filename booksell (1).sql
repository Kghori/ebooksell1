-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 06:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booksell`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocart`
--

CREATE TABLE `addtocart` (
  `id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `pdfnamecart` varchar(500) NOT NULL,
  `quatity` int(200) NOT NULL,
  `username_cart` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adminbook`
--

CREATE TABLE `adminbook` (
  `id` int(100) NOT NULL,
  `adminname` varchar(100) NOT NULL,
  `imagename` varchar(100) NOT NULL,
  `imagefile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adminbookupload`
--

CREATE TABLE `adminbookupload` (
  `id` int(11) NOT NULL,
  `adminname` varchar(12) NOT NULL,
  `imagename` varchar(50) NOT NULL,
  `imagefile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adminsignup`
--

CREATE TABLE `adminsignup` (
  `adminsno` int(11) NOT NULL,
  `adminusername` varchar(11) NOT NULL,
  `adminpassword` varchar(23) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminsignup`
--

INSERT INTO `adminsignup` (`adminsno`, `adminusername`, `adminpassword`, `dt`) VALUES
(1, 'jigisha', 'jigisha', '2023-08-19 12:50:36'),
(2, 'tne', 'tne', '2023-08-19 12:51:02'),
(3, 'kartik', '1234', '2024-01-05 12:01:37'),
(4, 'purn', 'purn', '2024-01-08 17:05:52'),
(5, 'kaushik', 'kaushik', '2024-01-09 23:20:18'),
(6, 'kritikh par', 'kritikh', '2024-01-10 23:31:18'),
(7, 'admin1', 'admin1', '2024-01-10 23:54:56'),
(8, 'pankti', 'pankti', '2024-01-12 23:59:04'),
(9, '', '', '2024-01-22 11:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategories`
--

CREATE TABLE `bookcategories` (
  `id` int(11) NOT NULL,
  `pcategories` varchar(100) NOT NULL,
  `admin_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookcategories`
--

INSERT INTO `bookcategories` (`id`, `pcategories`, `admin_name`) VALUES
(5, 'karavas', ''),
(6, 'novel', ''),
(9, 'krutarth', ''),
(48, 'shruti', ''),
(49, 'marbal', ''),
(50, '', ''),
(51, 'kuran', 'jigisha'),
(52, 'bhajan', 'jigisha'),
(53, 'bhajan', 'jigisha'),
(54, 'ramesh', 'kritikh par'),
(55, '51', 'jigisha'),
(56, '51', 'jigisha'),
(57, 'kuran', 'jigisha');

-- --------------------------------------------------------

--
-- Table structure for table `bookimgupload`
--

CREATE TABLE `bookimgupload` (
  `id` int(4) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `bookcategories` varchar(250) NOT NULL,
  `bookdesc` varchar(250) NOT NULL,
  `images` varchar(250) NOT NULL,
  `bookprice` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookimgupload`
--

INSERT INTO `bookimgupload` (`id`, `bookname`, `bookcategories`, `bookdesc`, `images`, `bookprice`) VALUES
(1, 'kemcho', 'hello bhi', 'hju', 'IMG_20220616_225058.jpg', 123),
(2, 'kemcho', 'hello bhi', 'hju', 'IMG_20220625_093637.jpg', 123);

-- --------------------------------------------------------

--
-- Table structure for table `booksupload`
--

CREATE TABLE `booksupload` (
  `id` int(11) NOT NULL,
  `bookname` varchar(110) NOT NULL,
  `bookcategories` varchar(100) NOT NULL,
  `bookdesc` varchar(200) NOT NULL,
  `filea` varchar(100) NOT NULL,
  `typea` varchar(100) NOT NULL,
  `sizea` varchar(100) NOT NULL,
  `bookprice` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booksupload`
--

INSERT INTO `booksupload` (`id`, `bookname`, `bookcategories`, `bookdesc`, `filea`, `typea`, `sizea`, `bookprice`) VALUES
(35, 'bum', 'hello bhi', 'kartik', 'IMG20220617204945.jpg', 'image/jpeg', '4195827', 100),
(36, 'kamar', 'hello bhi', 'aom', 'IMG20220819154606_BURST001.jpg', 'image/jpeg', '1560828', 1200),
(37, 'kjo', 'hello bhi', 'sjsjj', 'IMG20220819154606_BURST001.jpg', 'image/jpeg', '1560828', 100),
(38, 'lkj', 'hello bhi', 'kllo', 'IMG20220516094326.jpg', 'image/jpeg', '5062532', 1200),
(39, 'kartik', 'hello bhi', 'adf', 'IMG20220515184203.jpg', 'image/jpeg', '2980929', 1200),
(40, 'fhfh', 'eftk', 'At w3schools.com.', 'IMG_20220625_093637.jpg', 'image/jpeg', '6293279', 120);

-- --------------------------------------------------------

--
-- Table structure for table `book_order`
--

CREATE TABLE `book_order` (
  `no` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `flat` varchar(10) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pin_code` int(6) NOT NULL,
  `total_products` varchar(200) NOT NULL,
  `total_price` varchar(10) NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_order`
--

INSERT INTO `book_order` (`no`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`, `username`) VALUES
(75, 'fd', '7474747474', 'fsg@gmail.com', 'credit cart', 'fas', 'gs', 'sga', 'gf', 'gs', 741147, '', '1323', ''),
(87, 'fdsa', '747474747474', 'fdsa@gmail.com', 'credit cart', 'vsa', 'fas', 'fds', 'fga', 'gfs', 741147, 'Introduction_to_Machine_Learning_with_Python_PDFDrive_com_min (1).pdf', '1320', 'jigisha'),
(88, 'kartik', '747474747474', 'kartik@gmail.com', 'credit cart', 'fsad', 'anantwadi', 'bhavnagar', 'gujrat', 'india', 364002, 'resumevaghela jaydip.pdf', '243', 'jigisha'),
(89, 'kartik', '747474747474', 'kartik@gmail.com', 'credit cart', 'fsad', 'anantwadi', 'bhavnagar', 'gujrat', 'india', 364002, 'resumevaghela jaydip.pdf', '243', 'jigisha'),
(90, 'kartik', '747474747474', 'kartik@gmail.com', 'credit cart', 'fsad', 'anantwadi', 'bhavnagar', 'gujrat', 'india', 364002, 'resumevaghela jaydip.pdf', '243', 'jigisha'),
(91, 'kartik', '747474747474', 'kartik@gmail.com', 'credit cart', 'fsad', 'anantwadi', 'bhavnagar', 'gujrat', 'india', 364002, 'resumevaghela jaydip.pdf', '243', 'jigisha'),
(92, 'kartik', '9426758592', 'ja@gmail.com', 'credit cart', 'afsd', 'dfsa', 'fdsa', 'grrs', 'india', 741147, 'resumevaghela jaydip.pdf', '243', 'jigisha'),
(93, 'kartik', '9426758592', 'ja@gmail.com', 'credit cart', 'afsd', 'dfsa', 'fdsa', 'grrs', 'india', 741147, 'resumevaghela jaydip.pdf', '243', 'jigisha'),
(94, 'kartik', '9426758592', 'ja@gmail.com', 'credit cart', 'afsd', 'dfsa', 'fdsa', 'grrs', 'india', 741147, 'resumevaghela jaydip.pdf', '243', 'jigisha'),
(95, 'kartik', '9426758592', 'ja@gmail.com', 'credit cart', 'afsd', 'dfsa', 'fdsa', 'grrs', 'india', 741147, 'resumevaghela jaydip.pdf', '243', 'jigisha'),
(96, 'kaushik', '7474747474', 'hj@gmail.com', 'credit cart', 'fdas', 'fsag', 'fga', 'fgds', 'gfs', 858585, 'resumevaghela jaydip.pdf', '243', 'jigisha'),
(97, 'kaushik', '9426758592', 'fads@gmail.com', 'credit cart', 'fdsa', 'sfs', 'fs', 'fa', 'fsd', 741147, 'Data Science Guide .pdf (3).pdf', '1320', 'jigisha'),
(98, 'ram', '9426758592', 'fsda@gamil.com', 'credit cart', 'sa', 's', 'fgs', 'fgs', 'fgs', 741147, 'Data Science Guide .pdf (2).pdf', '123', 'jigisha'),
(99, 'kartik', '9474859225', 'fa@gmail.com', 'credit cart', 'fsa', 'gs', 'sf', 'gfs', 'fs', 258963, 'resumevaghela jaydip.pdf', '1320', 'jigisha'),
(100, 'jagdish', '6359456214', 'g@gmail.com', 'paypal', '1dasdkl', 'sdnaskd', 'bhavnagar', 'guj', 'ind', 654001, 'Cloud Computing Notes (2).pdf', '1288', 'jigisha'),
(101, 'karti', '7474747474', 'fads@gmail.com', 'credit cart', 'afds', 'fs', 'fga', 'gfs', 'fgs', 8787878, 'Cloud Computing Notes (2).pdf', '1288', 'jigisha'),
(102, 'afs', '9426758592', 'afsd@gmail.com', 'paypal', 'fads', 'afdsfasd', 'fasd', 'afsd', 'afsd', 741447, 'Python Cheatsheet  .pdf (1).pdf', '2416', 'jigisha'),
(103, 'afs', '9426758592', 'afsd@gmail.com', 'paypal', 'fads', 'afdsfasd', 'fasd', 'afsd', 'afsd', 741447, 'Python Cheatsheet  .pdf (1).pdf', '2416', 'jigisha'),
(104, 'gautam', '9426758595', 'gautam@gamil.com', 'credit cart', 'anantwadi', 'anantwadi', 'bhavnagar', 'gujrat', 'india', 147741, 'Cloud Computing Notes (2).pdf', '1417', 'jigisha');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quatity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quatity`) VALUES
(0, 'sql', 1100, 'Admin/upload/IMG20220610233350_BURST003.jpg', 1),
(1, 'php', 1300, 'Admin/upload/IMG20221008125922.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(3) NOT NULL,
  `file_name` varchar(30) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`) VALUES
(1, 'IMG_20220625_093637.jpg', '2023-09-23 14:07:57', '1'),
(2, 'IMG_20220625_193346.jpg', '2023-09-23 14:07:57', '1'),
(3, 'IMG_20220628_230837.jpg', '2023-09-23 14:07:57', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pdfname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `user` varchar(200) NOT NULL,
  `admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `razorpay_payment_id`, `status`, `pdfname`, `email`, `price`, `user`, `admin`) VALUES
(398, 'pay_NWnOU4StP7ZpbN', 'success', 'resumevaghela jaydip.pdf', 'ja@gmail.com', '243', 'jigisha', ''),
(399, 'pay_NWnWC27lDSuhb3', 'success', 'resumevaghela jaydip.pdf', 'hj@gmail.com', '243', 'jigisha', ''),
(400, '', 'success', 'resumevaghela jaydip.pdf', 'hj@gmail.com', '243', 'jigisha', ''),
(401, '', 'success', 'resumevaghela jaydip.pdf', 'hj@gmail.com', '243', 'jigisha', ''),
(402, 'pay_NWnYWekiZYOBs9', 'success', 'Data Science Guide .pdf (3).pdf', 'fads@gmail.com', '1320', 'jigisha', ''),
(403, 'pay_NWnbI5gq9p9Gj4', 'success', 'Data Science Guide .pdf (2).pdf', 'fsda@gamil.com', '123', 'jigisha', ''),
(404, '', 'success', 'Data Science Guide .pdf (2).pdf', 'fsda@gamil.com', '123', 'jigisha', ''),
(405, 'pay_NXGEQJLOdeT1Oc', 'success', 'resumevaghela jaydip.pdf', 'fa@gmail.com', '1320', 'jigisha', ''),
(406, 'pay_NXfVgeow5m5M9O', 'success', 'Cloud Computing Notes (2).pdf', 'g@gmail.com', '1288', 'jigisha', ''),
(407, 'pay_NXfVgeow5m5M9O', 'success', 'Cloud Computing Notes (2).pdf', 'g@gmail.com', '1288', 'jigisha', ''),
(408, 'pay_NXfVgeow5m5M9O', 'success', 'Cloud Computing Notes (2).pdf', 'g@gmail.com', '1288', 'jigisha', ''),
(409, 'pay_NXgFoXm6WoQly4', 'success', 'Cloud Computing Notes (2).pdf', 'fads@gmail.com', '1288', 'jigisha', ''),
(410, 'pay_Naotuep9EFCMmK', 'success', 'Python Cheatsheet  .pdf (1).pdf', 'afsd@gmail.com', '2416', 'jigisha', ''),
(411, 'pay_NccnMRw4hRO6yo', 'success', 'Cloud Computing Notes (2).pdf', 'gautam@gamil.com', '1417', 'jigisha', ''),
(412, '', 'success', 'Cloud Computing Notes (2).pdf', 'gautam@gamil.com', '1417', 'jigisha', '');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `sno` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(23) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`sno`, `username`, `password`, `dt`) VALUES
(23, 'gautam', '123456', '2023-08-19 09:39:39'),
(18, 'gui', 'gui', '2023-08-18 16:29:21'),
(16, 'hellobhai', 'hellobhai', '2023-08-18 16:25:32'),
(25, 'hii', 'hii', '2024-01-29 00:11:04'),
(22, 'jigisha', 'jigisha', '2023-08-18 17:17:13'),
(26, 'kartik', 'kartik', '2024-01-29 23:25:05'),
(24, 'kush', 'YUTh@9898', '2023-08-24 16:46:49'),
(19, 'result', '$2y$10$nmvHrZOLj8TakI8z', '2023-08-18 17:09:35'),
(20, 'username', '$2y$10$b0ZMO6gXRPdBIAHH', '2023-08-18 17:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `testimage`
--

CREATE TABLE `testimage` (
  `id` int(3) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `bookcategories` varchar(100) NOT NULL,
  `bookdesc` varchar(100) NOT NULL,
  `images1` varchar(1000) NOT NULL,
  `images2` varchar(250) NOT NULL,
  `images3` varchar(250) NOT NULL,
  `images4` varchar(250) NOT NULL,
  `pdfname` varchar(400) NOT NULL,
  `bookprice` int(100) NOT NULL,
  `admin_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimage`
--

INSERT INTO `testimage` (`id`, `bookname`, `bookcategories`, `bookdesc`, `images1`, `images2`, `images3`, `images4`, `pdfname`, `bookprice`, `admin_name`) VALUES
(181, 'data science', 'karavas', 'fsafsAt w3schools.com.', 'kau.jpg', 'PHOTO.jpg', 'sign.jpg', 'SSADM Example-Page-3 (4).jpg', 'Data Science Guide .pdf (2).pdf', 129, 'jigisha'),
(183, 'cloud', 'krutarth', 'hhha.', 'Screenshot (26).png', 'Screenshot (29).png', 'Screenshot (30).png', 'Screenshot (31).png', 'Cloud Computing Notes (2).pdf', 1288, 'jigisha'),
(184, 'pythone cheet sheet', 'bhajan', 'hello.', 'Screenshot (50).png', 'Screenshot (49).png', 'Screenshot (48).png', 'Screenshot (47).png', 'Python Cheatsheet  .pdf (1).pdf', 999, 'jigisha'),
(185, 'rambhai', '', 'jafj.', 'IMG_20200928_083636.jpg', 'IMG_20200924_203727.jpg', 'IMG_20200925_190045.jpg', 'IMG_20200925_194226.jpg', '𝐃𝐚𝐭𝐚_𝐒𝐜𝐢𝐞𝐧𝐜𝐞_𝐅𝐨𝐫_𝐃𝐞𝐯𝐞𝐥𝐨𝐩𝐞𝐫𝐬_!_.pdf', 123, 'kritikh par');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtocart`
--
ALTER TABLE `addtocart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminbook`
--
ALTER TABLE `adminbook`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminname` (`adminname`);

--
-- Indexes for table `adminbookupload`
--
ALTER TABLE `adminbookupload`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminname` (`adminname`);

--
-- Indexes for table `adminsignup`
--
ALTER TABLE `adminsignup`
  ADD PRIMARY KEY (`adminsno`),
  ADD UNIQUE KEY `adminusername` (`adminusername`);

--
-- Indexes for table `bookcategories`
--
ALTER TABLE `bookcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_name` (`id`);

--
-- Indexes for table `bookimgupload`
--
ALTER TABLE `bookimgupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booksupload`
--
ALTER TABLE `booksupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_order`
--
ALTER TABLE `book_order`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `testimage`
--
ALTER TABLE `testimage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addtocart`
--
ALTER TABLE `addtocart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `adminbook`
--
ALTER TABLE `adminbook`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adminbookupload`
--
ALTER TABLE `adminbookupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adminsignup`
--
ALTER TABLE `adminsignup`
  MODIFY `adminsno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bookcategories`
--
ALTER TABLE `bookcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `bookimgupload`
--
ALTER TABLE `bookimgupload`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booksupload`
--
ALTER TABLE `booksupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `book_order`
--
ALTER TABLE `book_order`
  MODIFY `no` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `testimage`
--
ALTER TABLE `testimage`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
