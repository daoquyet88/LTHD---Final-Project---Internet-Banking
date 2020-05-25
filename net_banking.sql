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
  `first_name` nvarchar(30) DEFAULT NULL,
  `last_name` nvarchar(30) DEFAULT NULL,
  `gender` nvarchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `aadhar_no` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` nvarchar(255) DEFAULT NULL,
  `branch` nvarchar(30) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL,
  `pin` int(4) DEFAULT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `acc_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`cust_id`, `first_name`, `last_name`, `gender`, `dob`, `aadhar_no`, `email`, `phone_no`, `address`, `branch`, `account_no`, `pin`, `uname`, `pwd`, `acc_status`) VALUES
(1, N'Phan Văn', N'Quân', N'Nam', '1993-10-01', 123456789, 'phanvanquanit@gmail.com', '+91 8918722499', N'HCM', N'newyork', 1122334455, 1234, 'phanvanquan', 'quan123', 1),
(2, N'Nguyễn Thế', N'Lợi', N'Nam', '1994-10-11', 987654321, 'ngtheloi.2710@gmail.com', '+966 895432167', N'HCM', N'newyork', 1133557788, 1234, 'loi', '123', 1),
(3, N'Đặng Ngọc', N'Vũ', N'Nam', '1995-02-03', 125656765, 'tusharpkt@gmail.com', '+334 123456987', N'HCM', N'paris', 1122338457, 1357, 'dangngocvu', 'vu123', 1),
(4, N'Nguyễn', N'Linh', N'Nữ', '1993-10-01', 015497845, 'linh@gmail.com', '0123456789', N'Ha Noi', N'paris', 1498721786, 1234, 'linh', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` nvarchar(40) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `created`) VALUES
(1, N'Ưu đãi', '2020-03-15 15:45:25'),
(2, N'Tài chính tiêu dùng', '2020-03-19 08:32:25'),
(3, N'Tài chính thế giới', '2020-03-25 08:32:25'),
(4, N'Chung tay chống dịch', '2020-04-01 09:45:55'),
(5, N'Thông báo nghỉ lễ', '2020-04-01 10:45:55'),
(6, N'Tài chính ngân hàng', '2020-04-06 11:46:21'),
(7, N'Chung tay chống dịch', '2020-04-08 09:45:55'),
(8, N'Giải pháp tài chính an toàn', '2020-04-09 16:39:35'),
(9, N'Tài chính tiêu dùng', '2020-04-15 16:39:35'),
(10, N'Tài chính kinh doanh', '2020-04-19 16:39:35'),
(11, N'Thông báo nghỉ lễ', '2020-04-29 16:39:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_body`
--

CREATE TABLE `news_body` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` nvarchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `news_body`
--

INSERT INTO `news_body` (`id`, `body`) VALUES
(1, N'Từ ngày 30/04/2020, Ngân hàng LQV miễn phí chuyển tiền đến tất cả ngân hàng trong nước với Internet Banking cùng nhiều ưu đãi hấp dẫn khác.'),
(2, N'Điều chỉnh tỉ giá ngoại tệ.'),
(3, N'Ngân hàng LQV giảm lãi xuất cho vay quý 2.'),
(4, N'Ngân hàng LQV triển khai gói tín dụng 100.000.000 tỷ đồng hỗ trợ khách hàng bị ảnh hưởng bởi dịch Covid 19.'),
(5, N'Thứ Năm, 02/04 nghỉ lễ Giổ Tổ Hùng Vương.'),
(6, N'Ngân hàng LQV với các giải pháp hỗ trợ khách hàng bị ảnh hưởng bởi dịch Covid-19.'),
(7, N'Ngân hàng LQV ủng hộ 1.000 tỷ đồng và thiết bị y tế chống dịch Covid-19.'),
(8, N'Tăng cường bảo mật thông tin với Internet Banking.'),
(9, N'Hàng ngàn ưu đãi, hoàn tiền khi mua sắm trực tuyến trên TIKI.'),
(10, N'Giải ngân 20.000 tỷ đồng hỗ trợ doanh nghiệp gặp khó khăn.'),
(11, N'Thứ Năm, 30/4 và thứ Sáu, 1/5 nghỉ lễ Giải phóng Miền Nam và Quốc Tế Lao Động.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `passbook1`
--

CREATE TABLE `passbook1` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` nvarchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `passbook1`
--

INSERT INTO `passbook1` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2017-09-06 22:18:36', N'Mở tài khoản', 0, 10000, 10000),
(2, '2017-10-02 18:49:26', N'Nhận từ: Salman Ali, Số tài khoản: 1133557799', 0, 20000, 30000),
(3, '2017-10-02 21:02:32', N'Gửi tới: Jon Snow, Số tài khoản: 1133557736', 10000, 0, 20000),
(4, '2017-10-05 20:11:33', N'Nhận từ: Salman Ali, Số tài khoản: 1133557799', 0, 69000, 89000),
(5, '2017-11-19 17:00:35', N'Tiền đặt cọc', 0, 2000000, 2089000),
(6, '2017-11-19 17:01:09', N'Gửi tới: Jon Snow, Số tài khoản: 1233556739', 15000, 0, 2074000),
(7, '2017-11-19 17:02:29', N'Nạp tiền', 25000, 0, 2049000),
(8, '2017-11-19 17:03:45', N'Gửi tới: Md Salman Ali, Số tài khoản: 1133557799', 50000, 0, 1999000),
(9, '2017-11-19 17:26:45', N'Nhận từ: Md Salman Ali, Số tài khoản: 1133557788', 0, 6123, 2005123),
(10, '2020-04-10 07:14:36', N'Gửi tới: Jon Snow, Số tài khoản: 1233556739', 12, 0, 2005111),
(11, '2020-04-10 07:15:09', N'Gửi tới: Jon Snow, Số tài khoản: 1233556739', 12, 0, 2005099),
(12, '2020-04-10 07:18:33', N'Gửi tới: Jon Snow, Số tài khoản: 1233556739', 10000, 0, 1995099),
(13, '2020-04-10 07:24:56', N'Nạp tiền', 10000, 0, 1985099),
(14, '2020-04-10 07:26:09', N'Nạp tiền', 10000, 0, 1975099),
(15, '2020-04-10 08:28:39', N'Gửi tới: Nguyễn Thế Lợi, Số tài khoản: 1133557788', 200000, 0, 1775099);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `passbook2`
--

CREATE TABLE `passbook2` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` nvarchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `passbook2`
--

INSERT INTO `passbook2` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2017-09-06 22:21:54', N'Mở tài khoản', 0, 20000, 20000),
(2, '2017-09-10 15:35:39', N'Nạp tiền', 2000, 0, 18000),
(3, '2017-09-26 17:51:47', N'Nạp tiền', 2500, 0, 15500),
(4, '2017-09-26 17:52:31', N'Tiền đặt cọc', 0, 3500, 19000),
(5, '2017-09-26 20:42:20', N'Tiền đặt cọc', 0, 2500, 21500),
(6, '2017-09-26 20:44:17', N'Nạp tiền', 1002, 0, 20498),
(7, '2017-09-29 19:38:04', N'Tiền đặt cọc', 0, 20000, 40498),
(8, '2017-09-29 19:38:49', N'Nạp tiền', 2000, 0, 38498),
(9, '2017-09-30 21:38:56', N'Tiền đặt cọc', 0, 10000, 48498),
(10, '2017-10-02 18:49:26', N'Gửi tới: Nafees Zakee, Số tài khoản: 1122334455', 20000, 0, 28498),
(11, '2017-10-03 00:18:44', N'Tiền đặt cọc', 0, 500000, 528498),
(12, '2017-10-05 20:11:33', N'Gửi tới: Nafees Zakee, Số tài khoản: 1122334455', 69000, 0, 459498),
(13, '2017-10-30 16:30:45', N'Tiền đặt cọc', 0, 10000, 469498),
(14, '2017-11-19 17:03:45', N'Nhận từ: Nafees Zakee, Số tài khoản: 1122334455', 0, 50000, 519498),
(15, '2017-11-19 17:26:45', N'Gửi tới: Nafees Zakee, Số tài khoản: 1122334455', 6123, 0, 513375),
(16, '2020-04-10 08:28:39', N'Nhận từ: Phan Văn Quân, Số tài khoản: 1122334455', 0, 200000, 713375);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `passbook3`
--

CREATE TABLE `passbook3` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` nvarchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `passbook3`
--

INSERT INTO `passbook3` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2017-09-26 18:23:03', N'Mở tài khoản', 0, 50000, 50000),
(2, '2017-09-26 18:42:41', N'Tiền đặt cọc', 0, 123456, 173456),
(3, '2017-09-26 18:42:52', N'Nạp tiền', 5698, 0, 167758),
(4, '2017-09-26 18:43:05', N'Nạp tiền', 9658, 0, 158100),
(5, '2017-09-26 18:43:23', N'Nạp tiền', 1569, 0, 156531),
(6, '2017-09-26 18:43:32', N'Nạp tiền', 12369, 0, 144162),
(7, '2017-09-26 18:43:53', N'Nạp tiền', 100000, 0, 44162),
(8, '2017-09-26 18:44:14', N'Tiền đặt cọc', 0, 200000, 244162),
(9, '2017-09-29 19:27:10', N'Nạp tiền', 10000, 0, 234162);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `passbook4`
--

CREATE TABLE `passbook4` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` nvarchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `passbook4`
--

INSERT INTO `passbook4` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2017-09-26 18:32:59', N'Mở tài khoản', 0, 20000, 20000),
(2, '2017-09-26 18:34:54', N'Nạp tiền', 10000, 0, 10000),
(3, '2017-09-26 18:35:08', N'Nạp tiền', 3659, 0, 6341),
(4, '2017-09-26 18:35:20', N'Tiền đặt cọc', 0, 69874, 76215),
(5, '2017-09-26 18:35:35', N'Tiền đặt cọc', 0, 89000, 165215),
(6, '2017-09-26 18:35:55', N'Nạp tiền', 10000, 0, 155215),
(7, '2017-09-26 19:29:49', N'Nạp tiền', 1236, 0, 153979),
(8, '2017-10-02 21:02:32', N'Nhận từ: Nafees Zakee, Số tài khoản: 1122334455', 0, 10000, 163979),
(9, '2017-11-19 17:01:09', N'Nhận từ: Nafees Zakee, Số tài khoản: 1122334455', 0, 15000, 178979),
(10, '2020-04-10 07:14:36', N'Nhận từ: Phan Văn Quân, Số tài khoản: 1122334455', 0, 12, 178991),
(11, '2020-04-10 07:15:09', N'Nhận từ: Phan Văn Quân, Số tài khoản: 1122334455', 0, 12, 179003),
(12, '2020-04-10 07:18:33', N'Nhận từ: Phan Văn Quân, Số tài khoản: 1122334455', 0, 10000, 189003);

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
