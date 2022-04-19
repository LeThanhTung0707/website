-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 19, 2021 lúc 06:01 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT -1,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `submit_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id_comment`, `id_post`, `id_user`, `name`, `content`, `submit_date`) VALUES
(1, 1, -1, 'John Doe', 'Thank you for taking the time to write this article, I really enjoyed reading it!\r\n\r\nThank you, David!', '2020-07-22 14:35:15'),
(2, 1, 11, 'David Adams', 'It\'s good to hear that you enjoyed this article.', '2020-07-22 14:36:19'),
(3, 1, -1, 'Michael', 'I appreciate the time and effort you spent writing this article, good job!', '2020-07-22 14:37:43'),
(25, 117, 0, 'admin', 'Hay quá hihiiihihihihiihihi', '2021-04-19 22:21:25'),
(26, 117, 0, 'admin', 'test', '2021-04-19 22:24:53'),
(27, 117, 0, 'admin', 'test', '2021-04-19 22:25:39'),
(28, 117, 0, 'admin', 'test', '2021-04-19 22:25:50'),
(29, 117, 0, 'admin', 'test', '2021-04-19 22:27:37'),
(30, 117, 0, 'admin', 'Bình Luận chơi cho vui ', '2021-04-19 22:27:47'),
(31, 117, 0, 'admin', 'test ', '2021-04-19 22:31:57'),
(32, 117, 0, 'admin', 'test', '2021-04-19 22:32:42'),
(33, 117, 0, 'admin', 'bình luận xong về lại binhf luận', '2021-04-19 22:32:53'),
(34, 115, 0, 'admin', 'test', '2021-04-19 22:39:39'),
(35, 115, 0, 'admin', 'test2', '2021-04-19 22:42:07'),
(36, 115, 0, 'admin', 'test', '2021-04-19 22:49:43'),
(37, 115, 0, 'admin', 'test', '2021-04-19 22:50:38'),
(38, 115, 0, 'admin', 'test time', '2021-04-19 22:56:58'),
(39, 113, 0, 'admin', '123', '2021-04-19 22:59:15'),
(40, 117, 0, 'admin', 'Bây giờ là 11h ngày 19.4.2021', '2021-04-19 23:01:02');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
