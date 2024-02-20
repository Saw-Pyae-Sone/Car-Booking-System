-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 06:39 PM
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
-- Database: `three_b_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE `ban` (
  `B_ID` int(11) NOT NULL,
  `B_from` date DEFAULT NULL,
  `B_to` date DEFAULT NULL,
  `B_reason` text DEFAULT NULL,
  `C_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`B_ID`, `B_from`, `B_to`, `B_reason`, `C_ID`) VALUES
(1, '2023-04-09', '2023-04-23', 'Your account has been Frozen', 22),
(2, '2023-04-09', '2023-04-23', 'Your account has been Frozen', 23),
(3, '2023-04-09', '2023-04-23', 'Your account has been Frozen', 24),
(4, '2023-04-09', '2023-04-23', 'Your account has been Frozen', 25),
(5, '2023-04-09', '2023-04-23', 'Your account has been Frozen', 26),
(6, '2023-04-25', '2023-05-09', 'Your account has been Frozen', 32);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BK_ID` int(11) NOT NULL,
  `BK_name` varchar(40) DEFAULT NULL,
  `BK_phone` varchar(20) DEFAULT NULL,
  `BK_email` varchar(50) DEFAULT NULL,
  `BK_comment` text DEFAULT NULL,
  `BK_dropoff_time` varchar(20) DEFAULT NULL,
  `BK_date` date DEFAULT NULL,
  `BK_vehicle` varchar(20) DEFAULT NULL,
  `BK_confirm` varchar(20) DEFAULT NULL,
  `BK_pay` varchar(20) DEFAULT NULL,
  `BK_cancel` varchar(20) DEFAULT NULL,
  `S_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BK_ID`, `BK_name`, `BK_phone`, `BK_email`, `BK_comment`, `BK_dropoff_time`, `BK_date`, `BK_vehicle`, `BK_confirm`, `BK_pay`, `BK_cancel`, `S_ID`, `C_ID`) VALUES
(1, 'Sam', '09545546546', 'Sam99@gmail.com', 'Please take care of my motorcycle', '9 to 12', '2023-03-30', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 3, 1),
(2, 'Pyae', '09653987265', 'Pyae34@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-03-30', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 13, 1),
(3, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-03-30', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 11, 1),
(4, 'Paing', '09782635482', 'pyhoewinn@gmail.com', 'My car is really dirty', '9 to 12', '2023-04-03', 'car', 'Confirmed', 'Paid', 'Cancelled', 4, 3),
(5, 'Pyae Sone', '65465465458', 'arkar@gmail.com', 'Take care of my car', '1 to 3', '2023-04-03', 'car', 'Confirmed', 'Paid', 'Uncancelled', 6, 2),
(6, 'Aung', '09635412367', 'kyiphyuaung16@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-04-04', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 13, 4),
(7, 'Thant', '03158964823', 'kyiphyuthant206@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-04-04', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 15, 5),
(8, 'Tun', '09782635412', 'chitko41322@gmail.com', 'Take care of my car', '1 to 3', '2023-04-04', 'Car', 'Confirmed', 'Unpaid', 'Cancelled', 16, 6),
(9, 'Pyae Sone', '65465465458', 'arkar@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-04-05', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 13, 2),
(10, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-04-05', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 13, 1),
(11, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-04-05', 'motocycle', 'Confirmed', 'Unpaid', 'Cancelled', 13, 1),
(12, 'Thant', '03158964823', 'kyiphyuthant206@gmail.com', 'Take care of my car', '1 to 3', '2023-04-06', 'car', 'Confirmed', 'Paid', 'Uncancelled', 12, 5),
(13, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my car', '9 to 12', '2023-04-06', 'car', 'Confirmed', 'Paid', 'Uncancelled', 14, 1),
(14, 'Tun', '09782635412', 'chitko41322@gmail.com', 'Take care of my car', '1 to 3', '2023-04-07', 'car', 'Confirmed', 'Unpaid', 'Cancelled', 10, 6),
(15, 'Aung', '09635412367', 'kyiphyuaung16@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-04-07', 'motocycle', 'Confirmed', 'Unpaid', 'Cancelled', 15, 4),
(16, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-04-07', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 7, 1),
(17, 'Hlaing', '09365482637', 'saihlaingkhay6677@gmail.com', 'Take care of my car', '9 to 12', '2023-04-08', 'car', 'Confirmed', 'Paid', 'Uncancelled', 10, 9),
(18, 'Myat', '09362587456', 'ayemyatmoncumdy@gmail.com', 'Take care of my car', '1 to 3', '2023-04-08', 'car', 'Confirmed', 'Paid', 'Uncancelled', 12, 8),
(19, 'Moe', '09658234687', 'mmoewint@gmail.com', 'Take care of my motocycle', '9 to 3', '2023-04-26', 'motocycle', 'Confirmed', 'Unpaid', 'Uncancelled', 17, 10),
(20, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-04-26', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 15, 30),
(21, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-04-26', 'motocycle', 'Unconfirm', 'Unpaid', 'Cancelled', 17, 1),
(22, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my car', '9 to 12', '2023-04-27', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 18, 30),
(23, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my car', '1 to 3', '2023-04-27', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 12, 30),
(24, 'sam', '09632536871', 'sawpyaesone23@gmail.com', 'Take care of my car', '9 to 12', '2023-04-24', 'car', 'Unconfirm', 'Unpaid', 'Cancelled', 10, 1),
(25, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my car', '1 to 3', '2023-04-24', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 18, 30),
(26, 'Aung', '09635412367', 'kyiphyuaung16@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-04-25', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 15, 4),
(27, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-04-25', 'motocyle', 'Unconfirm', 'Unpaid', 'Uncancelled', 17, 30),
(28, 'Hlaing', '09365482637', 'saihlaingkhay6677@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-04-25', 'motocycle', 'Unconfirm', 'Unpaid', 'Cancelled', 17, 9),
(29, 'Myint', '09653269874', 'Myint2333@gmail.com', 'Take care of my car', '1 to 3', '2023-05-03', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 12, 12),
(30, 'Yoon', '09581236482', 'Yoon12@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-05-05', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 7, 13),
(31, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my car', '9 to 12', '2023-05-05', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 12, 30),
(32, 'Bang', '09125489678', 'xinbang6634@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-05-05', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 13, 11),
(33, 'Leo', '09863548261', 'Leo33@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-05-01', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 3, 29),
(34, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-05-01', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 9, 1),
(35, 'Kyaw', '09536214825', 'Kyaw230@gmail.com', 'Take care of my car', '1 to 3', '2023-05-02', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 14, 14),
(36, 'Myint', '09653269874', 'Myint2333@gmail.com', 'Take care of my car', '9 to 12', '2023-05-08', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 12, 12),
(37, 'Hlaing', '09365482637', 'saihlaingkhay6677@gmail.com', 'Take care of my car', '1 to 3', '2023-05-08', 'car', 'Unconfirm', 'Unpaid', 'Cancelled', 12, 9),
(38, 'Yoon', '09581236482', 'Yoon12@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-05-09', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 7, 13),
(39, 'Leo', '09863548261', 'Leo33@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-05-09', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 9, 29),
(40, 'Bang', '09125489678', 'xinbang6634@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-05-09', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 11, 11),
(41, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my car', '9 to 12', '2023-05-11', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 12, 30),
(42, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-05-12', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 15, 1),
(43, 'Yoon', '09581236482', 'Yoon12@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-05-12', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 17, 13),
(44, 'Myint', '09653269874', 'Myint2333@gmail.com', 'Take care of my car', '1 to 3', '2022-05-15', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 10, 12),
(45, 'Kyaw', '09536214825', 'Kyaw230@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-05-13', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 13, 14),
(46, 'Sam', '09365128469', 'sawpyaesone23@gmail.com', 'Take care of my car', '9 to 12', '2023-04-30', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 2, 1),
(47, 'Sam', '09365128469', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-04-30', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 3, 1),
(48, 'Sam', '09365128469', 'sawpyaesone23@gmail.com', 'Take care of my car', '9 to 12', '2023-05-17', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 14, 1),
(49, 'Sam', '09365128469', 'sawpyaesone23@gmail.com', 'Take care of my car', '1 to 3', '2023-05-17', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 14, 1),
(50, 'Sam', '09365128469', 'sawpyaesone23@gmail.com', 'Take care of my car', '9 to 12', '2023-05-12', 'car', 'Unconfirm', 'Unpaid', 'Uncancelled', 12, 1),
(51, 'Aung', '09635412367', 'kyiphyuaung16@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-04-30', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 7, 4),
(52, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-05-22', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 13, 30),
(53, 'Hlaing', '09365482637', 'saihlaingkhay6677@gmail.com', 'Take care of my motocycle', '1 to 3', '2023-05-22', 'motocycle', 'Unconfirm', 'Unpaid', 'Uncancelled', 11, 9),
(54, 'Aung', '09635412367', 'kyiphyuaung16@gmail.com', 'Take care of my motocycle', '9 to 12', '2023-05-22', 'motocycle', 'Confirmed', 'Unpaid', 'Uncancelled', 7, 4),
(55, 'Pyae', '09653987265', 'Pyae34@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-01-30', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 13, 1),
(56, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-01-30', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 11, 1),
(57, 'Paing', '09782635482', 'pyhoewinn@gmail.com', 'My car is really dirty', '9 to 12', '2022-02-03', 'car', 'Confirmed', 'Paid', 'Uncancelled', 4, 3),
(58, 'Pyae Sone', '65465465458', 'arkar@gmail.com', 'Take care of my car', '1 to 3', '2022-02-03', 'car', 'Confirmed', 'Paid', 'Uncancelled', 6, 2),
(59, 'Aung', '09635412367', 'kyiphyuaung16@gmail.com', 'Take care of my motocycle', '9 to 12', '2022-02-04', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 13, 4),
(60, 'Thant', '03158964823', 'kyiphyuthant206@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-02-04', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 15, 5),
(61, 'Tun', '09782635412', 'chitko41322@gmail.com', 'Take care of my car', '1 to 3', '2022-02-04', 'Car', 'Confirmed', 'Unpaid', 'Cancelled', 16, 6),
(62, 'Pyae Sone', '65465465458', 'arkar@gmail.com', 'Take care of my motocycle', '9 to 12', '2022-03-05', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 13, 2),
(63, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-03-05', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 13, 1),
(64, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '9 to 12', '2022-03-05', 'motocycle', 'Confirmed', 'Unpaid', 'Cancelled', 13, 1),
(65, 'Thant', '03158964823', 'kyiphyuthant206@gmail.com', 'Take care of my car', '1 to 3', '2022-04-06', 'car', 'Confirmed', 'Paid', 'Uncancelled', 18, 5),
(66, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my car', '9 to 12', '2022-04-06', 'car', 'Confirmed', 'Paid', 'Uncancelled', 14, 1),
(67, 'Tun', '09782635412', 'chitko41322@gmail.com', 'Take care of my car', '1 to 3', '2022-05-07', 'car', 'Confirmed', 'Paid', 'Uncancelled', 18, 6),
(68, 'Aung', '09635412367', 'kyiphyuaung16@gmail.com', 'Take care of my motocycle', '9 to 12', '2022-05-07', 'motocycle', 'Confirmed', 'Unpaid', 'Cancelled', 15, 4),
(69, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-05-07', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 7, 1),
(70, 'Hlaing', '09365482637', 'saihlaingkhay6677@gmail.com', 'Take care of my car', '9 to 12', '2022-06-08', 'car', 'Confirmed', 'Paid', 'uncancelled', 10, 9),
(71, 'Myat', '09362587456', 'ayemyatmoncumdy@gmail.com', 'Take care of my car', '1 to 3', '2022-06-08', 'car', 'Confirmed', 'Paid', 'Cancelled', 12, 8),
(72, 'Moe', '09658234687', 'mmoewint@gmail.com', 'Take care of my motocycle', '9 to 3', '2022-07-26', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 17, 10),
(73, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-07-26', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 15, 30),
(74, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '9 to 12', '2022-08-26', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 17, 1),
(75, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my car', '9 to 12', '2022-09-27', 'car', 'Confirmed', 'Paid', 'Uncancelled', 18, 30),
(76, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my car', '1 to 3', '2022-09-27', 'car', 'Confirmed', 'Paid', 'Uncancelled', 12, 30),
(77, 'sam', '09632536871', 'sawpyaesone23@gmail.com', 'Take care of my car', '9 to 12', '2022-10-24', 'car', 'Confirmed', 'Paid', 'Uncancelled', 10, 1),
(78, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my car', '1 to 3', '2022-10-24', 'car', 'Confirmed', 'Paid', 'Uncancelled', 18, 30),
(79, 'Aung', '09635412367', 'kyiphyuaung16@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-08-25', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 15, 4),
(80, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my motocycle', '9 to 12', '2022-08-25', 'motocyle', 'Confirmed', 'Paid', 'Uncancelled', 17, 30),
(81, 'Hlaing', '09365482637', 'saihlaingkhay6677@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-08-25', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 17, 9),
(82, 'Myint', '09653269874', 'Myint2333@gmail.com', 'Take care of my car', '1 to 3', '2022-09-03', 'car', 'Confirmed', 'Paid', 'Uncancelled', 12, 12),
(83, 'Yoon', '09581236482', 'Yoon12@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-08-05', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 7, 13),
(84, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my car', '9 to 12', '2022-08-05', 'car', 'Confirmed', 'Paid', 'Uncancelled', 12, 30),
(85, 'Bang', '09125489678', 'xinbang6634@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-08-05', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 13, 11),
(86, 'Leo', '09863548261', 'Leo33@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-11-04', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 3, 29),
(87, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my motocycle', '9 to 12', '2022-11-01', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 9, 1),
(88, 'Kyaw', '09536214825', 'Kyaw230@gmail.com', 'Take care of my car', '1 to 3', '2022-11-02', 'car', 'Confirmed', 'Paid', 'Uncancelled', 14, 14),
(89, 'Myint', '09653269874', 'Myint2333@gmail.com', 'Take care of my car', '9 to 12', '2022-12-08', 'car', 'Confirmed', 'Paid', 'Uncancelled', 12, 12),
(90, 'Hlaing', '09365482637', 'saihlaingkhay6677@gmail.com', 'Take care of my car', '1 to 3', '2022-12-08', 'car', 'Confirmed', 'Paid', 'Uncancelled', 12, 9),
(91, 'Yoon', '09581236482', 'Yoon12@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-12-09', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 7, 13),
(92, 'Leo', '09863548261', 'Leo33@gmail.com', 'Take care of my motocycle', '9 to 12', '2022-12-09', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 9, 29),
(93, 'Bang', '09125489678', 'xinbang6634@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-12-09', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 11, 11),
(94, 'Peachy', '09632536871', 'Peachy@gmail.com', 'Take care of my car', '9 to 12', '2022-05-11', 'car', 'Confirmed', 'Paid', 'Uncancelled', 12, 30),
(95, 'sam', '09545546546', 'sawpyaesone23@gmail.com', 'Take care of my car', '1 to 3', '2022-05-11', 'car', 'Unconfirm', 'Unpaid', 'Cancelled', 18, 1),
(96, 'Yoon', '09581236482', 'Yoon12@gmail.com', 'Take care of my motocycle', '9 to 12', '2022-05-12', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 17, 13),
(97, 'Myint', '09653269874', 'Myint2333@gmail.com', 'Take care of my car', '1 to 3', '2022-05-15', 'car', 'Unconfirm', 'Unpaid', 'Cancelled', 10, 12),
(98, 'Kyaw', '09536214825', 'Kyaw230@gmail.com', 'Take care of my motocycle', '1 to 3', '2022-05-13', 'motocycle', 'Confirmed', 'Paid', 'Uncancelled', 13, 14);

-- --------------------------------------------------------

--
-- Table structure for table `b_admin`
--

CREATE TABLE `b_admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_name` varchar(30) DEFAULT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `admin_password` varchar(40) DEFAULT NULL,
  `admin_profile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `b_admin`
--

INSERT INTO `b_admin` (`admin_ID`, `admin_name`, `admin_email`, `admin_password`, `admin_profile`) VALUES
(1, 'Pyae Sone', 'nvl.testingemail@gmail.com', '258fcfde7459e1b23b229747159437b8', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `CT_ID` int(11) NOT NULL,
  `CT_name` varchar(40) DEFAULT NULL,
  `CT_email` varchar(50) DEFAULT NULL,
  `CT_subject` varchar(100) DEFAULT NULL,
  `CT_message` text DEFAULT NULL,
  `BK_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`CT_ID`, `CT_name`, `CT_email`, `CT_subject`, `CT_message`, `BK_ID`) VALUES
(1, 'Pyae Sone', 'sawpyaesone23@gmail.com', 'Business Matters', 'I would like to give a sponsor for your business.', 0),
(2, 'Paing Phyo Win', 'pphyoewinn@gmail.com', 'About Business', 'Do you offer any additional services, such as scratch or dent repair?', 0),
(3, 'Hlaing', 'saihlaingkhay6677@gmail.com', 'About Business', 'What are your prices for a full interior and exterior detail?', 0),
(4, 'Moe', 'mmoewint@gmail.com', 'About Business', 'I need my car detailed before an upcoming event, can you fit me in?', 0),
(5, 'Tun', 'chitko41322@gmail.com', 'About Business', 'Can you remove pet hair from my car\'s upholstery?', 0),
(6, 'Aye', 'ayemoeaung@gmail.com', 'About Business', 'What types of cleaning products do you use?', 0),
(7, 'Peachy', 'Peachy@gmail.com', 'About Business', 'How long will it take to detail my car?', 0),
(8, 'Thant', 'kyiphyuthant206@gmail.com', 'About Business', 'Quick turnaround time, and the car was ready on time.Do you offer any discounts for regular customers or referrals?', 0),
(9, 'Myat', 'ayemyatmoncumdy@gmail.com', 'About Business', 'Can you detail my motorcycle or RV?', 0),
(10, 'Aung', 'kyiphyuaung16@gmail.com', 'About Business', 'What is the best way to maintain my car\'s appearance after a detailing?', 0),
(11, 'Sam', 'sawpyaesone23@gmail.com', 'About Business', 'Are there any restrictions or special requirements for the type of cars you can detail?', 0),
(12, 'Moe', 'mmoewint@gmail.com', 'Cancel Request', 'Unfortunately, something came up and I won\'t be able to make it to my appointment.', 19),
(13, 'Peachy', 'Peachy@gmail.com', 'Cancel Request', 'I\'m canceling my appointment due to a conflict with another scheduled appointment.', 22),
(14, 'Peachy', 'Peachy@gmail.com', 'Cancel Request', 'I apologize for any inconvenience this may cause, but I have to cancel my appointment.', 27),
(15, 'Yoon', 'Yoon12@gmail.com', 'Cancel Request', 'I need to cancel my appointment and request a refund.', 30),
(16, 'Sam', 'sawpyaesone23@gmail.com', 'Cancel Request', 'I no longer need the car detailing service due to changes in my plans.', 21),
(17, 'Paing', 'pphyoewinn@gmail.com', 'Cancel Request', 'I would like to cancel my booking due to my personal matters', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` int(11) NOT NULL,
  `C_name` varchar(50) DEFAULT NULL,
  `C_email` varchar(50) DEFAULT NULL,
  `C_password` varchar(40) DEFAULT NULL,
  `C_phone` varchar(20) DEFAULT NULL,
  `C_profile` varchar(255) DEFAULT NULL,
  `C_address` text DEFAULT NULL,
  `C_status` varchar(20) DEFAULT NULL,
  `C_login_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `C_name`, `C_email`, `C_password`, `C_phone`, `C_profile`, `C_address`, `C_status`, `C_login_time`) VALUES
(1, 'Sam', 'sawpyaesone23@gmail.com', '258fcfde7459e1b23b229747159437b8', '09365128469', 'CEO.jpg', 'Taunggyi', 'Active', '2023-05-03'),
(2, 'Pyae Sone', 'stellanwaynway@gmail.com', 'ce55febc6774ba578b11802937ae7cee', '65465465458', 'user.png', 'Yangon', 'Active', '2023-03-10'),
(3, 'Paing', 'pphyoewinn@gmail.com', '61f2cfc2005b54f92a4352b14050832c', '09782635482', 'user.png', 'Taunggyi', 'Active', '2023-04-19'),
(4, 'Aung', 'kyiphyuaung16@gmail.com', 'bbc57cccfb4d86642da5205d287cf9fc', '09635412367', 'user.png', 'Mandalay', 'Active', '2023-04-25'),
(5, 'Arkar', 'arkar@gmail.com', 'ce55febc6774ba578b11802937ae7cee', '03158964823', 'user.png', 'Yangon', 'Active', '2023-01-03'),
(6, 'Tun', 'ppk116319@gmail.com', '3aafc4e0fc69525b768d4df1184124bd', '09782635412', 'user.png', 'Mandalay', 'Active', '2023-04-09'),
(7, 'Aye', 'ayemoeaung656@gmail.com', '68202eddd682d60a71dccc4c01ba3ca4', '09365289463', 'user.png', 'Yangon', 'Active', '2023-04-09'),
(8, 'Myat', 'ayemyatmoncumdy1112@gmail.com', 'eaa10fbeafabecc8e3316f96140bf3ae', '09362587456', 'user.png', 'Bago', 'Active', '2023-04-09'),
(9, 'Hlaing', 'saihlaingkhay625@gmail.com', '34953edcd8aba598e7b74259cede2b35', '09365482637', 'user.png', 'Monywa', 'Active', '2023-04-09'),
(10, 'Moe', 'mmoewint222@gmail.com', 'c0b17413db7ec080fdb5a8912bf260f5', '09658234687', 'user.png', 'NayPyiDaw', 'Active', '2023-04-09'),
(11, 'Bang', 'xinbl634@gmail.com', '7d278575b6dc281b95e0ea892d7cc7bf', '09125489678', 'user.png', 'Lashio', 'Active', '2023-04-09'),
(12, 'Myint', 'Myint2333@gmail.com', 'eae81360472ecec65ef7d4270142e2eb', '09653269874', 'user.png', 'PyinOoLwin', 'Active', '2023-04-09'),
(13, 'Yoon', 'Yoon12@gmail.com', '8195e100234ae2479f5fb022eab2920b', '09581236482', 'user.png', 'Mandalay', 'Active', '2023-04-09'),
(14, 'Kyaw', 'Kyaw230@gmail.com', '15ea66608b1b76110378b649caacf079', '09536214825', 'user.png', 'Yangon', 'Active', '2023-04-09'),
(15, 'Nya', 'Nya99@gmail.com', 'dbe7c6e1c5db9431cb83410c778ecfad', '09639685745', 'user.png', 'PyinOoLwin', 'Active', '2023-04-09'),
(16, 'Lin', 'Lin78@gmail.com', '8ef0d1e4784db398a7690365939e92ef', '09653854782', 'user.png', 'Taunggyi', 'Inactive', '2022-11-09'),
(17, 'Mya', 'Mya34@gmail.com', '8aa8d2c2bacf02392ecad2ecc98cc91d', '09652365368', 'user.png', 'Taunggyi', 'Active', '2022-11-09'),
(18, 'Gyi', 'Gyi56@gmail.com', 'ea61582f0a9475c7b879dd04b26df536', '09875634582', 'user.png', 'Lashio', 'Active', '2022-11-03'),
(19, 'Kaung', 'Kaung88@gmail.com', '8d2b2c72b5e6f58ad69383e260165b46', '09856236582', 'user.png', 'Kalaw', 'Active', '2022-11-06'),
(20, 'Thu', 'Thu44@gmail.com', '2bb14b2212133cefa193d37e6586b08f', '09321548965', 'user.png', 'Taungoo', 'Active', '2022-11-09'),
(21, 'Way', 'Way344@gmail.com', '1919872973e13b134c34044e852b1efb', '09863597823', 'user.png', 'Pathein', 'Active', '2022-11-03'),
(22, 'Noe', 'Noe88@gmail.com', '9826dfb65c317b1e39f8aa296591083a', '09652483597', 'user.png', 'Pyay', 'Ban', '2022-04-18'),
(23, 'Pyae', 'Pyae55@gmail.com', 'f249766ccfe56aaad77ffade0f4b7564', '09523648123', 'user.png', 'Mogok', 'Ban', '2022-05-03'),
(24, 'King', 'King92@gmail.com', '6b4c43ded05ff81f866bd951e56aa47f', '09564123698', 'user.png', 'Mongla', 'Ban', '2022-06-25'),
(25, 'Boo', 'Boo10@gmail.com', '775bb1a1bb501b5e05bab442688443e0', '09478236515', 'user.png', 'Mandalay', 'Ban', '2022-05-02'),
(26, 'Nway', 'Nway78@gmail.com', '95771e96ae08a0bde45ef1c6e1bbdde0', '09853621589', 'user.png', 'Mandalay', 'Ban', '2022-05-15'),
(28, 'Teo', 'Teo@gmail.com', '840dd2b8f64c7f73f19a45162dd7aa50', '09862543127', 'user.png', 'Kalaw', 'Active', '2023-04-26'),
(29, 'Leo', 'Leo33@gmail.com', '1cf6e4fe8c39efb63a436153d248027f', '09863548261', 'user.png', 'Mandalay', 'Active', '2023-03-24'),
(30, 'Peachy', 'Peachy@gmail.com', '199933031e0e834fad8c7fe91bc2b2be', '09632536871', 'user.png', 'Mandalay', 'Active', '2023-04-09'),
(31, 'Arkar', 'koarkar.cse@gmail.com', 'ce55febc6774ba578b11802937ae7cee', '09659321548', 'user.png', 'Mandalay', 'Active', '2023-04-26'),
(32, 'Sin', 'sin233@gmail.com', 'c3ea761b715ade9ad13efecdea0a1c4b', '09354621582', 'user.png', 'Taunggyi', 'Ban', '2022-05-06'),
(35, 'Queen', 'Queen1@gmail.com', 'a5368e0f9be19d886f1a77370ede9091', '09235489752', 'user.png', 'Yangon', 'Active', '2022-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `R_ID` int(11) NOT NULL,
  `R_subject` varchar(50) DEFAULT NULL,
  `R_message` text DEFAULT NULL,
  `Rating_star` int(11) DEFAULT NULL,
  `C_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`R_ID`, `R_subject`, `R_message`, `Rating_star`, `C_ID`) VALUES
(1, 'About Staffs', 'The staff was friendly and professional, and took great care of my car.', 4, 1),
(2, 'About Business', 'The detailing job was excellent, my car looks brand new!', 5, 12),
(3, 'About Services', 'I was very impressed with the attention to detail in the cleaning process.', 5, 13),
(4, 'About Business', 'The pricing was fair and reasonable for the quality of service provided.', 4, 3),
(5, 'About Business', 'The communication from the business was clear and responsive.', 5, 6),
(6, 'About Business', 'The location was convenient and easy to access.', 4, 4),
(7, 'About Business', 'I would highly recommend this car detailing business to others.', 5, 30),
(8, 'About Business', 'I am a repeat customer and have always been satisfied with the service.', 5, 7),
(9, 'About Services', 'The finished result exceeded my expectations.', 5, 2),
(10, 'About Business', 'The turnaround time for the detailing job was fast and efficient.', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `S_ID` int(11) NOT NULL,
  `S_name` varchar(30) DEFAULT NULL,
  `S_image` varchar(40) DEFAULT NULL,
  `S_price` int(11) DEFAULT NULL,
  `S_vehicle` varchar(20) DEFAULT NULL,
  `S_status` varchar(200) DEFAULT NULL,
  `ST_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`S_ID`, `S_name`, `S_image`, `S_price`, `S_vehicle`, `S_status`, `ST_ID`) VALUES
(1, 'Normal Wash', 'motorcycle.png', 25, 'motocycle', 'A normal motorcycle wash includes a basic exterior wash of the car\'s body, wheels, and tires, using soap and water to remove dirt and grime.', 1),
(2, 'Normal Wash', 'car-wash.png', 50, 'car', 'A normal car wash includes a basic exterior wash of the car\'s body, wheels, and tires, using soap and water to remove dirt and grime. ', 1),
(3, 'Premium Wash', 'Pwash.png', 50, 'motocycle', ' A Premium motorcycle wash includes detailing, interior cleaning of your motorcycle, and wash with premium soap. ', 1),
(4, 'Premium Wash', 'Pcarwash.png', 100, 'car', 'A Premium car wash includes detailing, interior cleaning of your car, and wash with premium soap.', 1),
(5, 'Glass Polish', 'polisher.png', 50, 'motocycle', 'Glass polish can be used to remove minor scratches and blemishes from motorcycle windshields and other glass surfaces.', 2),
(6, 'Glass Polish', 'polish.png', 100, 'car', 'Glass polish can be used to remove minor scratches and blemishes from car windshields and other glass surfaces.', 2),
(7, 'Paint Body Polish', 'paintbodypolish.png', 50, 'motocycle', 'Using a paint body polish on a motorcycle can restore the paint finish\'s shine and helps to protect the paint finish from future damage.', 2),
(8, 'Paint Body Polish', 'bodypaintpolish.png', 100, 'car', 'Using a paint body polish on a car can restore the paint finish\'s shine and helps to protect the paint finish from future damage.', 2),
(9, 'Paint Body Coating', 'spray-gun.png', 50, 'motocycle', 'PBC provides a protective layer on top of a motorcycle\'s paintwork to keep the paint looking new and shiny for longer.', 3),
(10, 'Paint Body Coating', 'car-painting.png', 100, 'car', 'PBC provides a protective layer on top of a Car\'s paintwork to keep the paint looking new and shiny for longer.', 3),
(11, 'Glass Coating', 'motocoating.png', 50, 'motocycle', 'Glass coating is a protective layer that can be applied to the surface of a motorcycle\'s glass components, like windshield or mirrors.', 3),
(12, 'Glass Coating', 'coating.png', 100, 'car', 'Glass coating is a protective layer that can be applied to the surface of a car\'s glass components, like windshield or mirrors\r\n', 3),
(13, 'Premium Engine Bay', 'engine.png', 25, 'motocycle', 'Engine bay wash involves a thorough cleaning of a motorcycle\'s engine bay using specialized cleaning products and equipment.', 4),
(14, 'Premium Engine Bay', 'carengine.png', 50, 'car', 'Engine bay wash involves a thorough cleaning of a car\'s engine bay using specialized cleaning products and equipment.', 4),
(15, 'Premium Headlight Restore', 'motoheadlight.png', 20, 'motocycle', 'Headlight restoration is a process of restoring the clarity of headlights that have become yellowed, hazy, or foggy over time.', 5),
(16, 'Premium Headlight Restore', 'headlight.png', 40, 'car', 'Headlight restoration is a process of restoring the clarity of headlights that have become yellowed, hazy, or foggy over time.', 5),
(17, 'Premium PPF', 'safety-glasses.png', 100, 'motocycle', 'Paint protection film is a durable film that is applied to the surface of a motorcycle\'s painted bodywork to protect it.', 6),
(18, 'Premium PPF', 'protection.png', 250, 'car', 'Paint protection film is a durable film that is applied to the surface of a car\'s painted bodywork to protect it.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `ST_ID` int(11) NOT NULL,
  `ST_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`ST_ID`, `ST_name`) VALUES
(1, 'Wash'),
(2, 'Polish'),
(3, 'Coating'),
(4, 'Bay'),
(5, 'Headlight restore'),
(6, 'Paint Protection Film');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`B_ID`),
  ADD KEY `C_ID` (`C_ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BK_ID`),
  ADD KEY `S_ID` (`S_ID`),
  ADD KEY `ST_ID` (`C_ID`);

--
-- Indexes for table `b_admin`
--
ALTER TABLE `b_admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`CT_ID`),
  ADD KEY `BK_ID` (`BK_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `C_ID` (`C_ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `ST_ID` (`ST_ID`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`ST_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ban`
--
ALTER TABLE `ban`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `b_admin`
--
ALTER TABLE `b_admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `CT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `ST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `ban_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_ID`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`S_ID`) REFERENCES `services` (`S_ID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
