-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 10, 2020 lúc 03:25 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `net_banking`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` char(25) DEFAULT NULL,
  `pwd` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pwd`) VALUES
(1, 'admin', 'password123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `beneficiary1`
--

CREATE TABLE `beneficiary1` (
  `benef_id` int(11) NOT NULL,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `beneficiary1`
--

INSERT INTO `beneficiary1` (`benef_id`, `benef_cust_id`, `email`, `phone_no`, `account_no`) VALUES
(1, 3, 'jon.snow@gmail.com', '+1 8918332797', 1233556739),
(2, 2, 'ali.salman@gmail.com', '+966 895432167', 1133557788);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `beneficiary2`
--

CREATE TABLE `beneficiary2` (
  `benef_id` int(11) NOT NULL,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `beneficiary2`
--

INSERT INTO `beneficiary2` (`benef_id`, `benef_cust_id`, `email`, `phone_no`, `account_no`) VALUES
(1, 2, 'zakee.nafees@gmail.com', '+91 8918722499', 1122334455);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `beneficiary3`
--

CREATE TABLE `beneficiary3` (
  `benef_id` int(11) NOT NULL,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `beneficiary4`
--

CREATE TABLE `beneficiary4` (
  `benef_id` int(11) NOT NULL,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `aadhar_no` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `branch` varchar(30) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL,
  `pin` int(4) DEFAULT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`cust_id`, `first_name`, `last_name`, `gender`, `dob`, `aadhar_no`, `email`, `phone_no`, `address`, `branch`, `account_no`, `pin`, `uname`, `pwd`) VALUES
(1, 'Phan Van', 'Quan', 'male', '1993-10-01', 123456789, 'phanvanquanit@gmail.com', '+91 8918722499', 'HCM city', 'HCM', 1122334455, 1234, 'phanvanquan', 'quan123'),
(2, 'Nguyen The', 'Loi', 'male', '1994-10-11', 987654321, 'ali.salman@gmail.com', '+966 895432167', 'HCM', 'HCM', 1133557788, 1234, 'nguyentheloi', 'loi123'),
(3, 'Dang Ngoc', 'Vu', 'male', '1995-02-03', 125656765, 'tusharpkt@gmail.com', '+334 123456987', 'HCM', 'HCM', 1122338457, 1357, 'dangngocvu', 'vu123'),
(4, 'qqqq', 'qqqqqqq', 'male', '1993-10-01', 0, 'qqqq.salman@gmail.com', '00000000000000000', NULL, 'HCM', 0, 0, 'qqqq', 'q123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `created`) VALUES
(1, 'Hello World !', '2017-09-06 15:45:25'),
(2, 'The First News !', '2017-09-06 15:45:55'),
(3, 'Increasing Interest Rates !', '2017-09-06 15:46:21'),
(4, 'GST on banking', '2017-11-19 16:39:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_body`
--

CREATE TABLE `news_body` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `news_body`
--

INSERT INTO `news_body` (`id`, `body`) VALUES
(1, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"'),
(2, 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.'),
(3, 'This is to inform that as of today interest rates will increase by 4.6% on loans and decrease by 5.8% on deposits. Effective immediately. '),
(4, 'This is to inform that GST shall be applied on all usages of :\r\n1. Credit Cards\r\n2. Debit Cards\r\n3. Internet Banking\r\nat a nominal (nationally applied) rate of 18%.\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `passbook1`
--

CREATE TABLE `passbook1` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `passbook1`
--

INSERT INTO `passbook1` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2017-09-06 22:18:36', 'Opening Balance', 0, 10000, 10000),
(2, '2017-10-02 18:49:26', 'Received from: Salman Ali, AC/No: 1133557799', 0, 20000, 30000),
(3, '2017-10-02 21:02:32', 'Sent to: Jon Snow, AC/No: 1133557736', 10000, 0, 20000),
(4, '2017-10-05 20:11:33', 'Received from: Salman Ali, AC/No: 1133557799', 0, 69000, 89000),
(5, '2017-11-19 17:00:35', 'Cash Deposit', 0, 2000000, 2089000),
(6, '2017-11-19 17:01:09', 'Sent to: Jon Snow, AC/No: 1233556739', 15000, 0, 2074000),
(7, '2017-11-19 17:02:29', 'Cash to Self', 25000, 0, 2049000),
(8, '2017-11-19 17:03:45', 'Sent to: Md Salman Ali, AC/No: 1133557799', 50000, 0, 1999000),
(9, '2017-11-19 17:26:45', 'Received from: Md Salman Ali, AC/No: 1133557788', 0, 6123, 2005123),
(10, '2020-04-10 07:14:36', 'Sent to: Jon Snow, AC/No: 1233556739', 12, 0, 2005111),
(11, '2020-04-10 07:15:09', 'Sent to: Jon Snow, AC/No: 1233556739', 12, 0, 2005099),
(12, '2020-04-10 07:18:33', 'Sent to: Jon Snow, AC/No: 1233556739', 10000, 0, 1995099),
(13, '2020-04-10 07:24:56', 'Cash to Self', 10000, 0, 1985099),
(14, '2020-04-10 07:26:09', 'Cash to Self', 10000, 0, 1975099),
(15, '2020-04-10 08:28:39', 'Sent to: Nguyen The Loi, AC/No: 1133557788', 200000, 0, 1775099);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `passbook2`
--

CREATE TABLE `passbook2` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `passbook2`
--

INSERT INTO `passbook2` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2017-09-06 22:21:54', 'Opening Balance', 0, 20000, 20000),
(2, '2017-09-10 15:35:39', 'Cash to Self', 2000, 0, 18000),
(3, '2017-09-26 17:51:47', 'Cash to Self', 2500, 0, 15500),
(4, '2017-09-26 17:52:31', 'Cash Deposit', 0, 3500, 19000),
(5, '2017-09-26 20:42:20', 'Cash Deposit', 0, 2500, 21500),
(6, '2017-09-26 20:44:17', 'Cash to Self', 1002, 0, 20498),
(7, '2017-09-29 19:38:04', 'Cash Deposit', 0, 20000, 40498),
(8, '2017-09-29 19:38:49', 'Cash to Self', 2000, 0, 38498),
(9, '2017-09-30 21:38:56', 'Cash Deposit', 0, 10000, 48498),
(10, '2017-10-02 18:49:26', 'Sent to: Nafees Zakee, AC/No: 1122334455', 20000, 0, 28498),
(11, '2017-10-03 00:18:44', 'Cash Deposit', 0, 500000, 528498),
(12, '2017-10-05 20:11:33', 'Sent to: Nafees Zakee, AC/No: 1122334455', 69000, 0, 459498),
(13, '2017-10-30 16:30:45', 'Cash Deposit', 0, 10000, 469498),
(14, '2017-11-19 17:03:45', 'Received from: Nafees Zakee, AC/No: 1122334455', 0, 50000, 519498),
(15, '2017-11-19 17:26:45', 'Sent to: Nafees Zakee, AC/No: 1122334455', 6123, 0, 513375),
(16, '2020-04-10 08:28:39', 'Received from: Phan Van Quan, AC/No: 1122334455', 0, 200000, 713375);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `passbook3`
--

CREATE TABLE `passbook3` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `passbook3`
--

INSERT INTO `passbook3` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2017-09-26 18:23:03', 'Opening Balance', 0, 50000, 50000),
(2, '2017-09-26 18:42:41', 'Cash Deposit', 0, 123456, 173456),
(3, '2017-09-26 18:42:52', 'Cash to Self', 5698, 0, 167758),
(4, '2017-09-26 18:43:05', 'Cash to Self', 9658, 0, 158100),
(5, '2017-09-26 18:43:23', 'Cash to Self', 1569, 0, 156531),
(6, '2017-09-26 18:43:32', 'Cash to Self', 12369, 0, 144162),
(7, '2017-09-26 18:43:53', 'Cash to Self', 100000, 0, 44162),
(8, '2017-09-26 18:44:14', 'Cash Deposit', 0, 200000, 244162),
(9, '2017-09-29 19:27:10', 'Cash to Self', 10000, 0, 234162);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `passbook4`
--

CREATE TABLE `passbook4` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `passbook4`
--

INSERT INTO `passbook4` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2017-09-26 18:32:59', 'Opening Balance', 0, 20000, 20000),
(2, '2017-09-26 18:34:54', 'Cash to Self', 10000, 0, 10000),
(3, '2017-09-26 18:35:08', 'Cash to Self', 3659, 0, 6341),
(4, '2017-09-26 18:35:20', 'Cash Deposit', 0, 69874, 76215),
(5, '2017-09-26 18:35:35', 'Cash Deposit', 0, 89000, 165215),
(6, '2017-09-26 18:35:55', 'Cash to Self', 10000, 0, 155215),
(7, '2017-09-26 19:29:49', 'Cash to Self', 1236, 0, 153979),
(8, '2017-10-02 21:02:32', 'Received from: Nafees Zakee, AC/No: 1122334455', 0, 10000, 163979),
(9, '2017-11-19 17:01:09', 'Received from: Nafees Zakee, AC/No: 1122334455', 0, 15000, 178979),
(10, '2020-04-10 07:14:36', 'Received from: Phan Van Quan, AC/No: 1122334455', 0, 12, 178991),
(11, '2020-04-10 07:15:09', 'Received from: Phan Van Quan, AC/No: 1122334455', 0, 12, 179003),
(12, '2020-04-10 07:18:33', 'Received from: Phan Van Quan, AC/No: 1122334455', 0, 10000, 189003);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `beneficiary1`
--
ALTER TABLE `beneficiary1`
  ADD PRIMARY KEY (`benef_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Chỉ mục cho bảng `beneficiary2`
--
ALTER TABLE `beneficiary2`
  ADD PRIMARY KEY (`benef_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Chỉ mục cho bảng `beneficiary3`
--
ALTER TABLE `beneficiary3`
  ADD PRIMARY KEY (`benef_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Chỉ mục cho bảng `beneficiary4`
--
ALTER TABLE `beneficiary4`
  ADD PRIMARY KEY (`benef_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `aadhar_no` (`aadhar_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news_body`
--
ALTER TABLE `news_body`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `passbook1`
--
ALTER TABLE `passbook1`
  ADD PRIMARY KEY (`trans_id`);

--
-- Chỉ mục cho bảng `passbook2`
--
ALTER TABLE `passbook2`
  ADD PRIMARY KEY (`trans_id`);

--
-- Chỉ mục cho bảng `passbook3`
--
ALTER TABLE `passbook3`
  ADD PRIMARY KEY (`trans_id`);

--
-- Chỉ mục cho bảng `passbook4`
--
ALTER TABLE `passbook4`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `beneficiary1`
--
ALTER TABLE `beneficiary1`
  MODIFY `benef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `beneficiary2`
--
ALTER TABLE `beneficiary2`
  MODIFY `benef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `beneficiary3`
--
ALTER TABLE `beneficiary3`
  MODIFY `benef_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `beneficiary4`
--
ALTER TABLE `beneficiary4`
  MODIFY `benef_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `news_body`
--
ALTER TABLE `news_body`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `passbook1`
--
ALTER TABLE `passbook1`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `passbook2`
--
ALTER TABLE `passbook2`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `passbook3`
--
ALTER TABLE `passbook3`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `passbook4`
--
ALTER TABLE `passbook4`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
