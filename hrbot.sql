-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2019 at 10:59 PM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `checkin_id` int(11) NOT NULL,
  `checkin_users_id` int(20) NOT NULL,
  `checkin_users_uid` varchar(60) NOT NULL,
  `checkin_emp_uid` varchar(20) NOT NULL,
  `checkin_status` varchar(150) NOT NULL,
  `checkin_type` int(10) NOT NULL,
  `checkin_category` int(10) NOT NULL,
  `checkin_lat` varchar(10) NOT NULL,
  `checkin_long` varchar(10) NOT NULL,
  `checkin_ip` varchar(20) NOT NULL,
  `checkin_mobile` varchar(20) NOT NULL,
  `checkin_phone` varchar(20) NOT NULL,
  `checkin_tablet` varchar(20) NOT NULL,
  `checkin_userAgent` varchar(20) NOT NULL,
  `checkin_os` varchar(20) NOT NULL,
  `checkin_iPhone` varchar(20) NOT NULL,
  `checkin_bot` varchar(20) NOT NULL,
  `checkin_Webkit` varchar(20) NOT NULL,
  `checkin_Build` varchar(20) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkin_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`checkin_id`, `checkin_users_id`, `checkin_users_uid`, `checkin_emp_uid`, `checkin_status`, `checkin_type`, `checkin_category`, `checkin_lat`, `checkin_long`, `checkin_ip`, `checkin_mobile`, `checkin_phone`, `checkin_tablet`, `checkin_userAgent`, `checkin_os`, `checkin_iPhone`, `checkin_bot`, `checkin_Webkit`, `checkin_Build`, `checkin_date`, `checkin_time`) VALUES
(21, 0, 'Ub184c30a66591ec0fa2d8246e02fe110', '00002', '', 1, 1, '13.8189603', '100.529098', '58.8.148.183', '\n iPhone', 'iPhone', '', '', 'iOS', 'true', 'false', '605.115', '', '2019-09-22', '16:48:41'),
(22, 0, 'Ub184c30a66591ec0fa2d8246e02fe110', '00002', '', 1, 3, '13.8189412', '100.529167', '58.8.148.183', '\n iPhone', 'iPhone', '', '', 'iOS', 'true', 'false', '605.115', '', '2019-09-22', '16:48:50'),
(23, 0, 'U29670dd6570fb942c53ee3c9aa446647', '1888', '', 2, 1, '13.8722584', '100.667613', '1.47.160.218', '\n UnknownPhone', 'UnknownPhone', '', 'Chrome', 'AndroidOS', 'false', 'false', '537.36', 'PPR1.180610.011', '2019-09-22', '16:56:28'),
(24, 0, 'U29670dd6570fb942c53ee3c9aa446647', '1888', '', 2, 1, '13.8722634', '100.667615', '1.47.160.218', '\n UnknownPhone', 'UnknownPhone', '', 'Chrome', 'AndroidOS', 'false', 'false', '537.36', 'PPR1.180610.011', '2019-09-22', '16:57:37'),
(25, 0, 'U3bedadc94ffac698b2c15ce6233a6f87', '581', '', 1, 1, '13.8722165', '100.667591', '171.6.180.133', '\n iPhone', 'iPhone', '', '', 'iOS', 'true', 'false', '605.115', '', '2019-09-22', '17:00:56'),
(26, 0, 'U3bedadc94ffac698b2c15ce6233a6f87', '581', '', 4, 3, '13.8722541', '100.667394', '171.6.180.133', '\n iPhone', 'iPhone', '', '', 'iOS', 'true', 'false', '605.115', '', '2019-09-22', '17:02:18'),
(27, 0, 'Ub47874e3e0cf45cad5ecef6d66996c1b', '6969', '', 2, 1, '13.8190831', '100.529200', '223.24.144.71', '\n iPhone', 'iPhone', '', '', 'iOS', 'true', 'false', '605.115', '', '2019-09-22', '17:02:34'),
(28, 0, 'U29670dd6570fb942c53ee3c9aa446647', '1888', '', 4, 3, '13.7764467', '100.627253', '1.47.9.93', '\n UnknownPhone', 'UnknownPhone', '', 'Chrome', 'AndroidOS', 'false', 'false', '537.36', 'PPR1.180610.011', '2019-09-22', '20:08:20'),
(29, 18, 'U48b33a17fef7cd19edee238beb4d8c59', '', 'ทักทาย', 1, 1, '13.8191389', '100.528943', '223.24.168.134', '\n UnknownPhone', 'UnknownPhone', '', 'Chrome', 'AndroidOS', 'false', 'false', '537.36', 'PPR1.180610.011', '2019-09-21', '22:34:53'),
(30, 18, 'U48b33a17fef7cd19edee238beb4d8c59', '', 'Test2', 1, 1, '13.8191896', '100.528888', '223.24.168.134', '\n UnknownPhone', 'UnknownPhone', '', 'Chrome', 'AndroidOS', 'false', 'false', '537.36', 'PPR1.180610.011', '2019-09-21', '22:38:25'),
(31, 18, 'U48b33a17fef7cd19edee238beb4d8c59', '', 'Test', 1, 1, '13.8192308', '100.528860', '223.24.168.134', '\n UnknownPhone', 'UnknownPhone', '', 'Chrome', 'AndroidOS', 'false', 'false', '537.36', 'PPR1.180610.011', '2019-09-21', '22:42:26'),
(32, 18, 'U48b33a17fef7cd19edee238beb4d8c59', '', 'ทดสอบ', 4, 3, '13.8191818', '100.528937', '223.24.168.134', '\n UnknownPhone', 'UnknownPhone', '', 'Chrome', 'AndroidOS', 'false', 'false', '537.36', 'PPR1.180610.011', '2019-09-22', '22:42:48'),
(33, 18, 'U48b33a17fef7cd19edee238beb4d8c59', '', '', 2, 3, '13.8191818', '100.528937', '223.24.168.134', '\n UnknownPhone', 'UnknownPhone', '', 'Chrome', 'AndroidOS', 'false', 'false', '537.36', 'PPR1.180610.011', '2019-09-21', '22:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `leave_paper`
--

CREATE TABLE `leave_paper` (
  `leave_paper_id` int(255) NOT NULL,
  `leave_paper_category` int(11) NOT NULL,
  `leave_paper_type` varchar(20) NOT NULL,
  `leave_paper_count_hour` varchar(20) NOT NULL,
  `leave_paper_reason` varchar(100) NOT NULL,
  `leave_paper_lat` varchar(20) NOT NULL,
  `leave_paper_long` varchar(20) NOT NULL,
  `leave_paper_start_date` date NOT NULL,
  `leave_paper_end_date` date NOT NULL,
  `leave_paper_users_id` int(20) NOT NULL,
  `leave_paper_users_emp_id` varchar(20) NOT NULL,
  `leave_paper_users_uid` varchar(50) NOT NULL,
  `leave_paper_created` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_paper`
--

INSERT INTO `leave_paper` (`leave_paper_id`, `leave_paper_category`, `leave_paper_type`, `leave_paper_count_hour`, `leave_paper_reason`, `leave_paper_lat`, `leave_paper_long`, `leave_paper_start_date`, `leave_paper_end_date`, `leave_paper_users_id`, `leave_paper_users_emp_id`, `leave_paper_users_uid`, `leave_paper_created`) VALUES
(1, 1, '9', '', 'ไข้หวัด', '13.819150321817583', '100.52905427343421', '2019-09-23', '2019-09-23', 0, '00002', 'Ub184c30a66591ec0fa2d8246e02fe110', '2019-09-22 12:38:34.000000'),
(2, 1, '9', '', 'ป่วย', '13.818914638861894', '100.52916034102428', '2019-09-22', '2019-10-10', 0, '6969', 'Ub47874e3e0cf45cad5ecef6d66996c1b', '2019-09-22 12:39:40.000000'),
(3, 1, '5', '', 'ปวดท้อง', '13.8192663', '100.5289228', '2019-09-13', '2019-09-20', 0, '000001', 'U48b33a17fef7cd19edee238beb4d8c59', '2019-09-22 16:06:50.000000'),
(4, 1, '0', '7', 'ป้วยหนัก', '13.8191818', '100.5289379', '2019-09-13', '2019-09-28', 18, '', 'U48b33a17fef7cd19edee238beb4d8c59', '2019-09-22 22:49:27.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(20) NOT NULL,
  `users_uid` varchar(50) NOT NULL,
  `users_emp_id` varchar(10) NOT NULL,
  `users_citizenid` varchar(50) NOT NULL,
  `users_fname` varchar(40) NOT NULL,
  `users_lname` varchar(40) NOT NULL,
  `users_department` varchar(20) NOT NULL,
  `users_section` varchar(20) NOT NULL,
  `users_created` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_uid`, `users_emp_id`, `users_citizenid`, `users_fname`, `users_lname`, `users_department`, `users_section`, `users_created`) VALUES
(10, 'U38cd0aaf197bc4ad2b56d34e1fd90d67', '000004', '0', 'palida', 'yuenyong', '0', 'support', '2019-09-22 00:42:56.000000'),
(11, 'Ub184c30a66591ec0fa2d8246e02fe110', '00002', '0', 'ปวีณ์กร', 'สอนอินทร์', '0', 'Programmer', '2019-09-22 12:34:26.000000'),
(12, 'Ub47874e3e0cf45cad5ecef6d66996c1b', '6969', '0', 'นายทินาคม', 'สงวนแก้ว', '0', 'โปรแกรมเมอร์', '2019-09-22 12:35:21.000000'),
(13, 'U29670dd6570fb942c53ee3c9aa446647', '1888', '0', 'Nuttee', 'Praphuttham', '0', 'MD', '2019-09-22 16:56:02.000000'),
(14, 'U3bedadc94ffac698b2c15ce6233a6f87', '581', '0', 'ปพน', 'เปรมใจ', '0', 'ITP', '2019-09-22 16:58:05.000000'),
(15, 'U93878a3aa12db07a7d282a7295791c0f', 'ONSITE', '0', 'ธันวา', 'วรรณอุดม', '0', 'บริการ ซ่อมแซม', '2019-09-22 17:47:07.000000'),
(18, 'U48b33a17fef7cd19edee238beb4d8c59', '', '1100501280640', 'Panudet', 'Panumas', '0', 'Dev', '2019-09-22 22:34:20.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`checkin_id`);

--
-- Indexes for table `leave_paper`
--
ALTER TABLE `leave_paper`
  ADD PRIMARY KEY (`leave_paper_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `checkin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `leave_paper`
--
ALTER TABLE `leave_paper`
  MODIFY `leave_paper_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
