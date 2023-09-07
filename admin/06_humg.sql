-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2022 lúc 08:48 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `06_humg`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `Cate_ID` int(11) NOT NULL,
  `Cate_Name` varchar(500) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`Cate_ID`, `Cate_Name`, `Status`) VALUES
(1, 'Tin tức', 1),
(2, 'Tuyển sinh', 1),
(3, 'Tổ chức', 1),
(4, 'Công tác sinh viên', 0),
(5, 'Giới thiệu', 1),
(6, 'Đào tạo', 1),
(7, 'Media', 1),
(8, 'Sự kiện', 1),
(9, 'Khoa học', 0),
(10, 'Văn bản', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass1` varchar(30) NOT NULL,
  `pass2` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id`, `username`, `pass1`, `pass2`, `name`) VALUES
(1, 'dacbac', '123456', '123456', 'Vương Đắc Bắc'),
(2, 'xuanhong', '123456', '123456', 'Vương Thị Xuân Hồng'),
(3, 'xuanquan', '123456', '123456', 'Vương Xuân Quân'),
(4, 'nguyenhang', '123456', '123456', 'Nguyễn Thị Hằng'),
(5, 'tientruong', '123456', '123456', 'Nguyễn Tiến Trường'),
(6, 'thephong', '123456', '123456', 'Nguyễn Thế Phong'),
(7, 'haiyen', '123456', '123456', 'Vương Thị Hải Yến'),
(8, 'vukhanh', '123456', '123456', 'Vũ Ngọc Khánh'),
(9, 'trihao', '123456', '123456', 'Vương Trí Hào'),
(10, 'anhduong', '123456', '123456', 'Nguyễn Thị Ánh Dương'),
(11, 'phuonganh', '123456', '123456', 'Nguyễn Thị Phương Anh'),
(12, 'xuanthai', '123456', '123456', 'Nguyễn Xuân Thái'),
(13, 'lebinh', '123456', '123456', 'Lê Văn Bình'),
(14, 'nguyenquan', '123456', '123456', 'Nguyễn Xuân Quân'),
(15, 'dactu', '123456', '123456', 'Vương Đắc Tú'),
(16, 'huuquan', '123456', '123456', 'Nguyễn Hữu Quân'),
(17, 'nhutai', '123456', '123456', 'Nguyễn Như Tài'),
(18, 'huonggiang', '123456', '123456', 'Nguyễn Hương Giang'),
(19, 'dothu', '123456', '123456', 'Đỗ Thị Thu'),
(20, 'thuthuy', '123456', '123456', 'Nguyễn Thu Thủy'),
(21, 'ngocanh', '123456', '123456', 'Vương Ngọc Thị Ánh'),
(22, 'maianh', '123456', '123456', 'Vương Thị Mai Anh'),
(23, 'maitho', '123456', '123456', 'Vương Thị Thơ'),
(24, 'thutra', '123456', '123456', 'Nguyễn Thị Thu Trà'),
(25, 'hiennhi', '123456', '123456', 'Nguyễn Hiền Nhi'),
(26, 'thuchang', '123456', '123456', 'Nguyễn Thu Chang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `News_ID` int(11) NOT NULL,
  `Cate_ID` int(11) NOT NULL,
  `Title` varchar(1000) NOT NULL,
  `Intro_Image` text NOT NULL,
  `Description` text NOT NULL,
  `Post_Date` varchar(12) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_news`
--

INSERT INTO `tbl_news` (`News_ID`, `Cate_ID`, `Title`, `Intro_Image`, `Description`, `Post_Date`, `Author`, `Status`) VALUES
(1, 1, 'David De Gea', '../uploads/1degea.jpg', 'David De Gea', '07/11/1990', 'Vuong Dac Bac', 0),
(2, 1, 'Victor Lindelof', '../uploads/2lindelof.jpg', 'Victor Lindelof', '17/07/1994', 'Vuong Dac Bac', 0),
(3, 1, 'Phil Jones', '../uploads/4jones.jpg', 'Phil Jones', '21/02/1992', 'Vuong Dac Bac', 1),
(4, 2, 'Harry Maguire', '../uploads/5maguire.jpg', 'Harry Maguire', '05/03/1993', 'Vuong Dac Bac', 0),
(5, 2, 'Lisandro Martinez', '../uploads/6lisandromartinez.jpg', 'Lisandro Martinez', '18/01/1998', 'Vuong Dac Bac', 0),
(6, 2, 'Cristiano Ronaldo', '../uploads/7ronaldo.jpg', 'Cristiano Ronaldo', '05/02/1985', 'Vuong Dac Bac', 1),
(7, 3, 'Bruno Fernandes', '../uploads/8bruno.jpg', 'Bruno Fernandes', '08/09/1994', 'Vuong Dac Bac', 0),
(8, 3, 'Anthony Martial', '../uploads/9martial.jpg', 'Anthony Martial', '05/12/1995', 'Vuong Dac Bac', 1),
(9, 3, 'Marcus Rashford', '../uploads/10rashford.jpg', 'Mason Greenwood', '01/10/2001', 'Vuong Dac Bac', 1),
(10, 4, 'Tyrell Malacia', '../uploads/12malacia.jpg', 'Tyrell Malacia', '17/08/1999', 'Vuong Dac Bac', 1),
(11, 4, 'Christian Eriksen', '../uploads/14eriksen.jpg ', 'Christian Eriksen', '14/02/1992', 'Vuong Dac Bac', 1),
(12, 4, 'Fred', '../uploads/17fred.jpeg ', 'Fred', '05/03/1993', 'Vuong Dac Bac', 0),
(13, 5, 'Casemiro', '../uploads/18casemiro.jpeg ', 'Casemiro', '23/02/1992', 'Vuong Dac Bac', 0),
(14, 5, 'Raphael Varane', '../uploads/19varane.jpeg ', 'Raphael Varane', '25/04/1993', 'Vuong Dac Bac', 1),
(15, 5, 'Diogo Dalot', '../uploads/20dalot.jpg ', 'Diogo Dalot', '18/03/1999', 'Vuong Dac Bac', 0),
(16, 6, 'Antony', '../uploads/21antony.jpg ', 'Antony', '24/02/2000', 'Vuong Dac Bac', 0),
(17, 6, 'Tom Heaton', '../uploads/22tomheaton.jpg ', 'Tom Heaton', '15/04/1986', 'Vuong Dac Bac', 1),
(18, 6, 'Luke Shaw', '../uploads/23shaw.jpg ', 'Luke Shaw', '12/07/1995', 'Vuong Dac Bac', 0),
(19, 7, 'Jadon Sancho', '../uploads/25sancho.jpg ', 'Jadon Sancho', '25/03/2000', 'Vuong Dac Bac', 1),
(20, 7, 'Facundo Pellistri', '../uploads/28pellistri.jpg ', 'Facundo Pellistri', '20/12/2001', 'Vuong Dac Bac', 1),
(21, 7, 'Aaron Wan-Bissaka', '../uploads/29wanbissaka.jpg ', 'Aaron Wan-Bissaka', '26/11/1997', 'Vuong Dac Bac', 1),
(22, 8, 'Martin Dubravka', '../uploads/31dubravka.jpg ', 'Martin Dubravka', '15/01/1989', 'Vuong Dac Bac', 1),
(23, 8, 'Brandon Williams', '../uploads/33brandonwilliams.jpg ', 'Bradon Williams', '03/09/2000', 'Vuong Dac Bac', 1),
(24, 8, 'Donny van de Beek', '../uploads/34vandebeek.jpg ', 'Donny van de Beek', '18/04/1997', 'Vuong Dac Bac', 1),
(25, 9, 'Anthony Elanga', '../uploads/36elanga.jpg ', 'Anthony Elanga', '27/04/2002', 'Vuong Dac Bac', 1),
(26, 9, 'Axel Tuanzebe', '../uploads/38tuanzebe.jpg ', 'Axel Tuanzebe', '14/11/1997', 'Vuong Dac Bac', 1),
(27, 9, 'Scott McTominay', '../uploads/39mctominay.jpg ', 'Scott McTominay', '08/12/1996', 'Vuong Dac Bac', 1),
(28, 10, 'Teden Mengi', '../uploads/43tedenmengi.jpg ', 'Teden Mengi', '30/04/2002', 'Vuong Dac Bac', 1),
(29, 10, 'Shola Shoretire', '../uploads/47shoretire.jpeg ', 'Shola Shoretire', '02/02/2004', 'Vuong Dac Bac', 1),
(30, 10, 'Alejandro Garnancho', '../uploads/49garnacho.jpg ', 'Alejandro Garnancho', '01/07/2004', 'Vuong Dac Bac', 1),
(31, 1, 'Paul Pogba', '', 'Paul Pogba', '15/03/1993', 'Vuong Dac Bac', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(100) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `Pass_Word` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `User_Name`, `Pass_Word`) VALUES
(1, 'admin', '123456'),
(2, 'dacbac', '27022002'),
(3, 'xuanhong', '27092002'),
(4, 'xuanquan', '14012002'),
(5, 'ngockhanh', '16082002'),
(6, 'tientruong', '07072002'),
(7, 'nguyenhang', '31122002'),
(8, 'haiyen', '01092002'),
(9, 'phuonganh', '12122002');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `testpt`
--

CREATE TABLE `testpt` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `testpt`
--

INSERT INTO `testpt` (`id`, `title`) VALUES
(1, 'David De Gea'),
(2, 'Victor Lindelof'),
(3, 'Phil Jones'),
(4, 'Harry Maguire'),
(5, 'Lisandro Martinez'),
(6, 'Cristiano Ronaldo'),
(7, 'Bruno Fernandes'),
(8, 'Anthony Martial'),
(9, 'Mason Greenwood'),
(10, 'Tyrell Malacia'),
(11, 'Christian Eriksen'),
(12, 'Fred'),
(13, 'Casemiro'),
(14, 'Raphael Varane'),
(15, 'Diogo Dalot'),
(16, 'Antony'),
(17, 'Tom Heaton'),
(18, 'Luke Shaw'),
(19, 'Jadon Sancho'),
(20, 'Facundo Pellistri'),
(21, 'Aaron Wan-Bissaka'),
(22, 'Martin Dubravka'),
(23, 'Brandon Williams'),
(24, 'Donny van de Beek'),
(25, 'Anthony Elanga'),
(26, 'Axel Tuanzebe'),
(27, 'Scott McTominay'),
(28, 'Teden Mengi'),
(29, 'Shola Shoretire'),
(30, 'Alejandro Garnancho');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_xahoi`
--

CREATE TABLE `tin_xahoi` (
  `title` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(1000) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `uploadfile`
--

CREATE TABLE `uploadfile` (
  `News_ID` int(100) NOT NULL,
  `Intro_Image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `uploadfile`
--

INSERT INTO `uploadfile` (`News_ID`, `Intro_Image`) VALUES
(1, '../uploads/1degea.jpg'),
(2, '../uploads/2lindelof.jpg'),
(3, '../uploads/4jones.jpg'),
(4, '../uploads/5maguire.jpg'),
(5, '../uploads/6lisandromartinez.jpg'),
(6, '../uploads/7ronaldo.jpg'),
(7, '../uploads/8bruno.jpg'),
(8, '../uploads/9martial.jpg'),
(9, '../uploads/10rashford.jpg'),
(10, '../uploads/12malacia.jpg'),
(11, '../uploads/14eriksen.jpg '),
(12, '../uploads/17fred.jpeg '),
(13, '../uploads/18casemiro.jpeg '),
(14, '../uploads/19varane.jpeg '),
(15, '../uploads/20dalot.jpg '),
(16, '../uploads/21antony.jpg '),
(17, '../uploads/22tomheaton.jpg '),
(18, '../uploads/23shaw.jpg '),
(19, '../uploads/25sancho.jpg '),
(20, '../uploads/28pellistri.jpg '),
(21, '../uploads/29wanbissaka.jpg '),
(22, '../uploads/31dubravka.jpg '),
(23, '../uploads/33brandonwilliams.jpg '),
(24, '../uploads/34vandebeek.jpg '),
(25, '../uploads/36elanga.jpg '),
(26, '../uploads/38tuanzebe.jpg '),
(27, '../uploads/39mctominay.jpg '),
(28, '../uploads/43tedenmengi.jpg'),
(29, '../uploads/47shoretire.jpeg'),
(30, '../uploads/49garnacho.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`Cate_ID`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`News_ID`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `testpt`
--
ALTER TABLE `testpt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `uploadfile`
--
ALTER TABLE `uploadfile`
  ADD PRIMARY KEY (`News_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `Cate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `News_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `testpt`
--
ALTER TABLE `testpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `uploadfile`
--
ALTER TABLE `uploadfile`
  MODIFY `News_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `uploadfile`
--
ALTER TABLE `uploadfile`
  ADD CONSTRAINT `uploadfile_ibfk_1` FOREIGN KEY (`News_ID`) REFERENCES `tbl_news` (`News_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
