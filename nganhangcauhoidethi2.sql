-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 22, 2021 lúc 04:45 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nganhangcauhoidethi2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `name` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('admin', '$2y$10$qmFeIrc5mVzV6TqwPblptemCgIozbe./9iVXvTBl9PwuQBBzcLeb.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bailam`
--

CREATE TABLE `bailam` (
  `IDBaiLam` int(11) NOT NULL,
  `IDDeThi` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT NULL,
  `SoCauDung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bailam`
--

INSERT INTO `bailam` (`IDBaiLam`, `IDDeThi`, `name`, `TrangThai`, `SoCauDung`) VALUES
(26, 22, 'htl', 1, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bomon`
--

CREATE TABLE `bomon` (
  `MaBoMon` varchar(10) CHARACTER SET utf8 NOT NULL,
  `TenBoMon` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bomon`
--

INSERT INTO `bomon` (`MaBoMon`, `TenBoMon`) VALUES
('BM001', 'Công nghệ thông tin'),
('BM002', 'Công nghệ phần mềm'),
('BM003', 'Hệ thống thông tin'),
('BM004', 'Mạng máy tính và truyền thông'),
('BM005', 'Khoa học máy tính'),
('BM006', 'Tin học ứng dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `canbo`
--

CREATE TABLE `canbo` (
  `MaCanBo` varchar(10) CHARACTER SET utf8 NOT NULL,
  `MaBoMon` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `HoTen` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` varchar(3) DEFAULT NULL,
  `HocVi` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `MaChucVu` varchar(10) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `canbo`
--

INSERT INTO `canbo` (`MaCanBo`, `MaBoMon`, `HoTen`, `NgaySinh`, `GioiTinh`, `HocVi`, `MaChucVu`) VALUES
('CB001', 'BM001', 'Nguyễn Thanh Trung', '1967-11-23', 'Nam', 'Thạc sĩ', 'CV002'),
('CB002', 'BM005', 'Trần Mạnh Hùng', '1991-02-03', 'Nam', 'Tiến sĩ', 'CV003'),
('CB003', 'BM001', 'Phan Ngọc Thảo', '1987-09-16', 'Nữ', 'Tiến sĩ', 'CV002');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `IDCauHoi` int(11) NOT NULL,
  `MaCanBo` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `MaMonHoc` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `MaMucDo` varchar(3) DEFAULT NULL,
  `CHNoiDung` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `Duyet` tinyint(1) DEFAULT 0,
  `Count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`IDCauHoi`, `MaCanBo`, `MaMonHoc`, `MaMucDo`, `CHNoiDung`, `Duyet`, `Count`) VALUES
(117, 'CB001', 'CT178', 'NB', 'Hệ điều hành là chương trình hoạt động giữa người sử dụng với?', 1, 1),
(118, 'CB001', 'CT178', 'NB', 'Trong việc phân loại mô hình hệ điều hành, loại có nhiều bộ xử lí cùng chia sẽ hệthống đường truyền, dữ liệu, đồng hồ, bộ nhớ, các thiết bị ngoại vi thuộc dạng:', 1, 1),
(119, 'CB001', 'CT178', 'NB', 'Ở hệ điều hành có cấu trúc phân lớp, tập hợp các lời gọi hệ thống được tạo ra bởi:', 1, 0),
(120, 'CB001', 'CT178', 'NB', 'Lời gọi hệ thống là lệnh do hệ điều hành cung cấp dùng để giao tiếp giữa hệ điều hành và:', 1, 0),
(121, 'CB001', 'CT101', 'NB', 'Giả sử a, b là 2 số thực. Biểu thức nào dưới đây không đúng theo cú pháp của ngôn ngữ lập trình C:', 1, 2),
(122, 'CB001', 'CT101', 'NB', 'Kiểu dữ liệu nào dưới đây được coi là kiểu dữ liệu cơ bản trong ngôn ngữ lập trình C:', 1, 2),
(123, 'CB001', 'CT101', 'NB', 'Kiểu dữ liệu nào dưới đây không được coi là kiểu dữ liệu cơ bản trong ngôn ngữ lập trình C:', 1, 1),
(124, 'CB001', 'CT101', 'NB', 'Giả sử có câu lệnh ch[]=\"A\". Ch chưa bao nhiêu bytes:', 1, 1),
(125, 'CB003', 'CT101', 'TH', 'Trong các hàm sau, hàm nào là hàm không dùng để in một chuỗi kí tự ra màn hình:', 1, 1),
(127, 'CB003', 'CT101', 'TH', 'Lệnh nào trong các lệnh sau cho phép chuyển sang vòng lặp tiếp theo mà không cần phải thực hiện phần còn lại', 1, 1),
(128, 'CB003', 'CT101', 'TH', 'Trong các hàm sau, hàm nào để nhập một kí tự từ bằng phím ngay sau khi gõ, không chờ nhấn Enter và không hiện ra màn hình:', 1, 0),
(129, 'CB003', 'CT101', 'VD', 'Độ ưu tiên đối với các toán tử logic là:', 1, 1),
(130, 'CB003', 'CT101', 'VD', 'Kết quả in ra màn hình của biểu thức sau: -3+4%5/2', 1, 1),
(131, 'CB003', 'CT101', 'VD', 'Phép trừ 2 con trỏ có cùng kiểu sẽ là:', 1, 0),
(132, 'CB003', 'CT101', 'VD', 'Phép toán 1 ngôi nào dùng để xác định địa chỉ của đối tượng mà con trỏ chỉ tới:', 1, 0),
(133, 'CB003', 'CT101', 'VDC', 'Đáp án của đoạn chương trình sau:', 1, 1),
(134, 'CB003', 'CT101', 'VDC', 'Kết quả in ra màn hình của chương trình sau:', 1, 1),
(135, 'CB003', 'CT101', 'VDC', 'Kết quả chương trình sau:', 1, 0),
(136, 'CB003', 'CT101', 'VDC', 'Giả sử trong ngôn ngữ C sử dụng khai báo “double a[12]”, phần tử a[7] là phần tử thứ bao nhiêu trong mảng a:', 1, 0),
(137, 'CB001', 'CT101', 'TH', 'Ngôn ngữ lập trình nào dưới đây là ngôn ngữ lập trình có cấu trúc?', 1, 0),
(138, 'CB001', 'CT101', 'TH', 'Những tên biến dưới đây được viết đúng theo quy tắc đặt tên của ngôn ngữ lập trình C?', 1, 0),
(139, 'CB001', 'CT101', 'TH', 'Một biến được gọi là biến toàn cục nếu:', 1, 0),
(140, 'CB001', 'CT101', 'TH', 'Một biến được gọi là một biến địa phương nếu:', 1, 0),
(141, 'CB001', 'CT101', 'VD', 'Xâu định dạng nào dưới đây dùng để in ra một số nguyên hệ 16:', 1, 0),
(142, 'CB001', 'CT101', 'VD', 'Xâu định dạng nào dưới đây dùng để in ra một số nguyên hệ 8:', 1, 0),
(143, 'CB001', 'CT101', 'VD', 'Xâu định dạng nào dưới đây dùng để in ra một xâu kí tự:', 1, 0),
(144, 'CB001', 'CT101', 'VD', 'Xâu định dạng nào dưới đây dùng để in ra một kí tự:', 1, 0),
(145, 'CB001', 'CT101', 'VD', 'Xâu định dạng nào dưới đây dùng để in ra một số nguyên dài:', 1, 0),
(146, 'CB001', 'CT101', 'VD', 'Xâu định dạng nào dưới đây dùng để in ra địa chỉ của một biến:', 1, 0),
(147, 'CB001', 'CT101', 'VD', 'Xâu định dạng nào dưới đây dùng để in ra một số nguyên:', 1, 0),
(148, 'CB001', 'CT101', 'VD', 'Xâu định dạng nào dưới đây dùng để in ra một số thực có độ chính xác kép:', 1, 0),
(149, 'CB001', 'CT101', 'VD', 'Xâu định dạng nào sau đây dùng để in ra một số thực có độ chính xác đơn:', 1, 0),
(150, 'CB001', 'CT101', 'TH', 'Các kí hiệu đặc trưng cho sự tác động lên dữ liệu gọi là:', 1, 0),
(151, 'CB001', 'CT101', 'TH', 'Cái gì quyết định kích thước của vùng nhớ được cấp phát cho các biến:', 1, 0),
(152, 'CB001', 'CT101', 'TH', 'Lệnh fflush (stdin) dùng để làm gì:', 1, 0),
(153, 'CB001', 'CT101', 'TH', 'Phép toán % có ý nghĩa gì?', 1, 0),
(154, 'CB001', 'CT101', 'TH', 'Toán tử \"++n\" được hiểu:', 1, 0),
(155, 'CB001', 'CT101', 'VDC', 'Kết quả của chương trình sau là gì:', 1, 0),
(156, 'CB001', 'CT101', 'VDC', 'Kết quả của đoạn chương trình sau là gì:', 1, 0),
(157, 'CB001', 'CT101', 'VDC', 'Kết quả in ra màn hình của đoạn chương trình sau:', 1, 0),
(158, 'CB001', 'CT101', 'VDC', 'Kết quả của đoạn chương trình sau là gì:', 1, 0),
(159, 'CB001', 'CT101', 'NB', 'Kết quả in ra của chương trình sau:', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi_bailam`
--

CREATE TABLE `cauhoi_bailam` (
  `ID` int(11) NOT NULL,
  `IDBaiLam` int(11) DEFAULT NULL,
  `IDCauHoi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cauhoi_bailam`
--

INSERT INTO `cauhoi_bailam` (`ID`, `IDBaiLam`, `IDCauHoi`) VALUES
(54, 26, 127),
(55, 26, 121),
(56, 26, 125),
(57, 26, 129),
(58, 26, 133),
(59, 26, 130),
(60, 26, 134),
(61, 26, 122);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdt`
--

CREATE TABLE `chitietdt` (
  `IDDeThi` int(11) NOT NULL,
  `IDCauHoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdt`
--

INSERT INTO `chitietdt` (`IDDeThi`, `IDCauHoi`) VALUES
(22, 121),
(22, 122),
(22, 125),
(22, 127),
(22, 129),
(22, 130),
(22, 133),
(22, 134),
(23, 117),
(23, 118);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaChucVu` varchar(10) CHARACTER SET utf8 NOT NULL,
  `TenChucVu` varchar(30) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MaChucVu`, `TenChucVu`) VALUES
('CV001', 'Quản trị viên'),
('CV002', 'Trưởng bộ môn'),
('CV003', 'Giảng viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dapan`
--

CREATE TABLE `dapan` (
  `IDDapAn` int(11) NOT NULL,
  `IDCauHoi` int(11) DEFAULT NULL,
  `NoiDung` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dapan`
--

INSERT INTO `dapan` (`IDDapAn`, `IDCauHoi`, `NoiDung`, `TrangThai`) VALUES
(220, 117, 'Phần cứng của máy tính', 1),
(221, 117, 'Phần mềm của máy tính', 0),
(222, 117, 'Các chương trình ứng dụng', 0),
(223, 117, 'CPU và bộ nhớ', 0),
(224, 118, 'Hệ thống xử lý thời gian thực', 1),
(225, 118, 'Hệ thống xử lý đơn nhiệm', 0),
(226, 118, 'Hệ thống xử lý đa nhiệm', 0),
(227, 118, 'Hệ thống xử lý phân tán', 0),
(228, 118, 'Hệ thống xử lý song song', 0),
(229, 119, 'Lớp kế lớp phần cứng - hạt nhân', 1),
(230, 119, 'Lớp ứng dụng', 0),
(231, 119, 'Lớp phần cứng', 0),
(232, 119, 'Lớp giao tiếp với người sử dụng', 0),
(233, 120, 'Tiến trình', 1),
(234, 120, 'Chương trình ứng dụng', 0),
(235, 120, 'Người sử dụng', 0),
(236, 120, 'Phần cứng máy tính', 0),
(237, 121, 'a>>=b', 1),
(238, 121, 'a-=b', 0),
(239, 121, 'a+=b', 0),
(240, 121, 'a*=b', 0),
(241, 122, 'Kiểu double', 1),
(242, 122, 'Kiểu mảng', 0),
(243, 122, 'Kiểu hợp', 0),
(244, 122, 'Kiểu con trỏ', 0),
(245, 123, 'Kiểu mảng', 1),
(246, 123, 'Kiểu enum', 0),
(247, 123, 'Kiểu short int', 0),
(248, 123, 'Kiểu unsigned ', 0),
(249, 124, '2', 1),
(250, 124, '1', 0),
(251, 124, '3', 0),
(252, 124, '4', 0),
(253, 125, 'puts()', 1),
(254, 125, 'printf()', 0),
(255, 125, 'scanf()', 0),
(256, 125, 'gets()', 0),
(258, 127, 'continue', 1),
(259, 127, 'goto', 0),
(260, 127, 'break', 0),
(261, 127, 'return', 0),
(262, 128, 'getch()', 1),
(263, 128, 'getche()', 0),
(264, 128, 'getchar()', 0),
(265, 128, 'scanf()', 0),
(266, 129, 'NOT, AND, OR', 1),
(267, 129, 'OR, NOT, AND', 0),
(268, 129, 'NOT, OR, AND', 0),
(269, 129, 'AND, NOT ', 0),
(270, 130, '-1', 1),
(271, 130, '-3', 0),
(272, 130, '1', 0),
(273, 130, 'Kết quả khác', 0),
(274, 131, 'Một số nguyên', 1),
(275, 131, 'Kết quả khác', 0),
(276, 131, 'Không thực hiện được', 0),
(277, 131, 'Một con trỏ có cùng kiểu', 0),
(278, 132, '&', 1),
(279, 132, 'Kết quả khác', 0),
(280, 132, '!', 0),
(281, 132, '*', 0),
(282, 133, '16.67', 1),
(283, 133, '16', 0),
(284, 133, '16.00', 0),
(285, 133, 'Đáp án khác', 0),
(286, 134, 'chao ban', 1),
(287, 134, 'chao cac', 0),
(288, 134, 'chao cac ban', 0),
(289, 134, 'Kết quả khác', 0),
(290, 135, '15 21', 1),
(291, 135, '21 15', 0),
(292, 135, 'Báo lỗi khi thực hiện chương trình', 0),
(293, 135, 'Đáp án khác', 0),
(294, 136, 'Thứ 8', 1),
(295, 136, 'Thứ 6', 0),
(296, 136, 'Thứ 7', 0),
(297, 136, 'Thứ 9', 0),
(298, 137, 'Ngôn ngữ C và Pascal', 1),
(299, 137, 'Ngôn ngữ Cobol', 0),
(300, 137, 'Ngôn ngữ Assembler', 0),
(301, 137, 'Tất cả đều đúng', 0),
(302, 138, '_diemtoan', 1),
(303, 138, 'diem toan', 0),
(304, 138, '3diemtoan', 0),
(305, 138, '-diemtoan', 0),
(306, 139, 'Nó được khai báo ngoài tất cả các hàm kể cả hàm main()', 1),
(307, 139, 'Nó được khai báo tất cả các hàm, ngoại trừ hàm main()', 0),
(308, 139, 'Nó được khai báo bên ngoài hàm main()', 0),
(309, 139, 'Nó được khai báo bên trong hàm main()', 0),
(310, 140, 'Nó được khai báo bên trong các hàm hoặc thủ tục, kể cả hàm main()', 1),
(311, 140, 'Nó được khai báo bên ngoài các hàm kể cả hàm main()', 0),
(312, 140, 'Nó được khai báo bên trong các hàm ngoại trừ hàm main()', 0),
(313, 140, 'Nó được khai báo bên trong hàm main()', 0),
(314, 141, '\"%x\"', 1),
(315, 141, '\"%d\"', 0),
(316, 141, '\"%i\"', 0),
(317, 141, '\"%u\"', 0),
(318, 142, '\"%o\"', 1),
(319, 142, '\"%u\"', 0),
(320, 142, '\"%x\"', 0),
(321, 142, '\"%ld\"', 0),
(322, 143, '\"%s\"', 1),
(323, 143, '\"%c\"', 0),
(324, 143, '\"%x\"', 0),
(325, 143, '\"%f\"', 0),
(326, 144, '\"%c\"', 1),
(327, 144, '\"%s\"', 0),
(328, 144, '\"%x\"', 0),
(329, 144, '\"%f\"', 0),
(330, 145, '\"%ld\"', 1),
(331, 145, '\"%d\"', 0),
(332, 145, '\"%x\"', 0),
(333, 145, '\"%o\"', 0),
(334, 146, '\"%p\"', 1),
(335, 146, '\"%u\"', 0),
(336, 146, '\"%o\"', 0),
(337, 146, '\"%e\"', 0),
(338, 147, '\"%d\"', 1),
(339, 147, '\"%e\"', 0),
(340, 147, '\"%u\"', 0),
(341, 147, '\"%p\"', 0),
(342, 148, '\"%e\"', 1),
(343, 148, '\"%u\"', 0),
(344, 148, '\"%o\"', 0),
(345, 148, '\"%p\"', 0),
(346, 149, '\"%f\"', 1),
(347, 149, '\"%e\"', 0),
(348, 149, '\"%u\"', 0),
(349, 149, '\"%o\"', 0),
(350, 150, 'Toán tử', 1),
(351, 150, 'Biến', 0),
(352, 150, 'Biểu thức', 0),
(353, 150, 'Hàm', 0),
(354, 151, 'Kiểu dữ liệu của biến', 1),
(355, 151, 'Tất cả đều đúng', 0),
(356, 151, 'Tên biến', 0),
(357, 151, 'Giá trị của biến', 0),
(358, 152, 'Xóa sạch bộ nhớ đệm', 1),
(359, 152, 'Xóa bộ nhớ đệm', 0),
(360, 152, 'Đọc kí tự từ bàn phím', 0),
(361, 152, 'Kết quả khác', 0),
(362, 153, 'Lấy phần dư của phép chia hai số nguyên', 1),
(363, 153, 'Đổi dấu một số thực hoặc một số nguyên', 0),
(364, 153, 'Chia hai số thực hoặc nguyên', 0),
(365, 153, 'Tất cả đều sai', 0),
(366, 154, 'Giá trị của n được tăng lên trước khi giá trị của nó được sử dụng', 1),
(367, 154, 'Giá trị n giảm đi sau khi giá trị của nó được sử dụng', 0),
(368, 154, 'Giá trị n giảm đi trước khi giá trị của nó được sử dụng', 0),
(369, 154, 'Giá trị của n được tăng lên sau khi giá trị của nó được sử dụng', 0),
(370, 155, '1', 1),
(371, 155, '0', 0),
(372, 155, 'true', 0),
(373, 155, 'Đáp án khác', 0),
(374, 156, 'Kết quả khác', 1),
(375, 156, 'Lỗi khi xây dựng chương trình', 0),
(376, 156, 'n = 45, c = \'\'', 0),
(377, 156, 'n = 45, c = \'r\'', 0),
(378, 157, '\"d\"', 1),
(379, 157, '\"D\"', 0),
(380, 157, '100', 0),
(381, 157, 'Kết quả khác', 0),
(382, 158, 'n = 10, c = \'\'', 1),
(383, 158, 'n = 10, c = \'T\'', 0),
(384, 158, 'Lỗi khi xây dựng chương trình', 0),
(385, 158, 'Đáp án khác', 0),
(386, 159, 'Vòng lặp vô hạn', 1),
(387, 159, '\"1\"', 0),
(388, 159, '\"1 2\"', 0),
(389, 159, 'Kết quả khác', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dapan_bailam`
--

CREATE TABLE `dapan_bailam` (
  `ID` int(11) NOT NULL,
  `IDDapAn` int(11) DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT NULL,
  `IDCHBL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dapan_bailam`
--

INSERT INTO `dapan_bailam` (`ID`, `IDDapAn`, `TrangThai`, `IDCHBL`) VALUES
(223, 261, 0, 54),
(224, 258, 1, 54),
(225, 260, 0, 54),
(226, 259, 0, 54),
(227, 240, 0, 55),
(228, 239, 0, 55),
(229, 238, 0, 55),
(230, 237, 1, 55),
(231, 255, 0, 56),
(232, 254, 0, 56),
(233, 256, 0, 56),
(234, 253, 1, 56),
(235, 267, 0, 57),
(236, 269, 0, 57),
(237, 268, 0, 57),
(238, 266, 1, 57),
(239, 282, 1, 58),
(240, 285, 0, 58),
(241, 283, 0, 58),
(242, 284, 0, 58),
(243, 270, 1, 59),
(244, 272, 0, 59),
(245, 273, 0, 59),
(246, 271, 0, 59),
(247, 287, 0, 60),
(248, 289, 0, 60),
(249, 288, 0, 60),
(250, 286, 1, 60),
(251, 241, 1, 61),
(252, 242, 0, 61),
(253, 243, 0, 61),
(254, 244, 0, 61);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dethi`
--

CREATE TABLE `dethi` (
  `IDDeThi` int(11) NOT NULL,
  `MaCanBo` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `MaMonHoc` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `TieuDe` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `NgayTao` date DEFAULT NULL,
  `SLCauHoi` int(11) DEFAULT NULL,
  `ThoiGianLamBai` int(11) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Test` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dethi`
--

INSERT INTO `dethi` (`IDDeThi`, `MaCanBo`, `MaMonHoc`, `TieuDe`, `NgayTao`, `SLCauHoi`, `ThoiGianLamBai`, `Password`, `Test`) VALUES
(22, 'CB003', 'CT101', 'Đề 15 phút', '2020-12-30', 8, 15, '123', 1),
(23, 'CB003', 'CT178', 'Đề thi thử', '2020-12-30', 2, 3, '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanhch`
--

CREATE TABLE `hinhanhch` (
  `IDAnh` int(100) NOT NULL,
  `IDCauHoi` int(11) DEFAULT NULL,
  `Vitri` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hinhanhch`
--

INSERT INTO `hinhanhch` (`IDAnh`, `IDCauHoi`, `Vitri`) VALUES
(67, 133, 'img_CH/Capture1.PNG'),
(68, 134, 'img_CH/Capture2.PNG'),
(69, 135, 'img_CH/Capture.PNG'),
(70, 155, 'img_CH/Capture3.PNG'),
(71, 156, 'img_CH/Capture4.PNG'),
(72, 157, 'img_CH/Capture5.PNG'),
(73, 158, 'img_CH/Capture6.PNG'),
(74, 159, 'img_CH/Capture7.PNG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanhda`
--

CREATE TABLE `hinhanhda` (
  `IDAnh` int(11) NOT NULL,
  `IDDapAn` int(11) DEFAULT NULL,
  `Vitri` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMonHoc` varchar(10) CHARACTER SET utf8 NOT NULL,
  `TenMonHoc` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `MaBoMon` varchar(10) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MaMonHoc`, `TenMonHoc`, `MaBoMon`) VALUES
('CT101', 'Lập trình căn bản A', 'BM001'),
('CT103', 'Cấu trúc dữ liệu', 'BM002'),
('CT109', 'Phân tích thiết kế hệ thống thông tin', 'BM003'),
('CT112', 'Mạng máy tính', 'BM004'),
('CT127', 'Lý thuyết thông tin', 'BM005'),
('CT171', 'Nhập môn công nghệ phần mềm', 'BM002'),
('CT172', 'Toán rời rạc', 'BM005'),
('CT174', 'Phân tích và thiết kế thuật toán', 'BM002'),
('CT175', 'Lý thuyết đồ thị', 'BM005'),
('CT176', 'Lập trình hướng đối tượng', 'BM004'),
('CT178', 'Nguyên lý hệ điều hành', 'BM001'),
('CT179', 'Quản trị hệ thống', 'BM001'),
('CT180', 'Cơ sở dữ liệu', 'BM003'),
('CT181', 'Hệ thống thông tin doanh nghiệp', 'BM003'),
('CT182', 'Ngôn ngữ mô hình hóa', 'BM003'),
('CT183', 'Anh văn chuyên môn CNTT 1', 'BM001'),
('CT184', 'Anh văn chuyên môn CNTT 2', 'BM001'),
('CT187', 'Nền tảng công nghệ thông tin', 'BM001'),
('CT202', 'Nguyên lý máy học', 'BM005'),
('CT203', 'Đồ họa máy tính', 'BM005'),
('CT209', 'Đồ họa nâng cao', 'BM005'),
('CT211', 'An ninh mạng', 'BM004'),
('CT212', 'Quản trị mạng', 'BM004'),
('CT221', 'Lập trình mạng', 'BM004'),
('CT222', 'An toàn hệ thống', 'BM001'),
('CT223', 'Quản lý dự án phần mềm', 'BM002'),
('CT227', 'Kĩ thuật tấn công mạng', 'BM004'),
('CT229', 'Bảo mật website', 'BM004'),
('CT236', 'Quản trị cơ sở dữ liệu trên Windows', 'BM001'),
('CT237', 'Nguyên lý hệ quản trị cơ sở dữ liệu', 'BM001'),
('CT241', 'Máy học nâng cao', 'BM005'),
('CT242', 'Kiến trúc và thiết kế phần mềm', 'BM002'),
('CT243', 'Đảm bảo chất lượng và kiểm thử phần mềm', 'BM002'),
('CT244', 'Bảo trì phần mềm', 'BM002'),
('CT245', 'Tương tác người máy', 'BM002'),
('CT246', 'Lập trình .Net', 'BM002'),
('CT253', 'Quản trị yêu cầu người dùng', 'BM003'),
('CT254', 'Bảo mật, an toàn hệ thống thông tin', 'BM003'),
('CT255', 'Nghiệp vụ thông minh', 'BM003'),
('CT256', 'Tổng quan về hệ thống thông tin địa lý', 'BM003'),
('CT273', 'Giao diện người máy', 'BM003'),
('CT274', 'Lập trình cho thiết bị di động', 'BM004'),
('CT276', 'Lập trình Java', 'BM002'),
('CT277', 'Hệ quản trị SQL', 'BM006'),
('CT312', 'Khai khoáng dữ liệu', 'BM005'),
('CT316', 'Xử lý ảnh', 'BM005'),
('CT332', 'Trí tuệ nhân tạo', 'BM005'),
('CT335', 'Thiết kế và cài đặt mạng', 'BM004'),
('CT344', 'Giải quyết sự cố mạng', 'BM004'),
('CT430', 'Phân tích hệ thống hướng đối tượng', 'BM003'),
('TN', 'Lập trình Java nâng cao', 'BM006'),
('TN204', 'Thiết kế hệ thống thông tin', 'BM006'),
('TN207', 'Lập trình .Net', 'BM006'),
('TN221', 'Thiết kế web', 'BM006'),
('TN230', 'Xây dựng ứng dụng Web với .Net', 'BM006'),
('TN277', 'Quản trị dự án tin học', 'BM006'),
('TN411', 'Xây dựng ứng dụng Web với PHP và MySQL', 'BM006'),
('TN412', 'Xây dựng ứng dụng Web với Java', 'BM006'),
('TN414', 'Lập trình ứng dụng mạng', 'BM006');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mucdocauhoi`
--

CREATE TABLE `mucdocauhoi` (
  `MaMucDo` varchar(3) NOT NULL,
  `MucDo` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mucdocauhoi`
--

INSERT INTO `mucdocauhoi` (`MaMucDo`, `MucDo`) VALUES
('NB', 'Nhận biết'),
('TH', 'Thông hiểu'),
('VD', 'Vận dụng'),
('VDC', 'Vận dụng cao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MaPhanQuyen` varchar(10) CHARACTER SET utf8 NOT NULL,
  `TenPhanQuyen` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`MaPhanQuyen`, `TenPhanQuyen`) VALUES
('01', 'Quản trị viên'),
('02', 'Trưởng bộ môn'),
('03', 'Giảng viên'),
('04', 'Sinh viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSinhVien` varchar(10) NOT NULL,
  `TenSinhVien` varchar(100) DEFAULT NULL,
  `GioiTinh` varchar(3) DEFAULT NULL,
  `MaBoMon` varchar(10) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MaSinhVien`, `TenSinhVien`, `GioiTinh`, `MaBoMon`) VALUES
('B1706519', 'Nguyễn Thị Mỹ Quyên', 'Nữ', 'BM001'),
('B1706529', 'Trần Ngọc Trân', 'Nữ', 'BM001'),
('B1706714', 'Hồ Thị Lài', 'Nữ', 'BM001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `MaCanBo` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `MaPhanQuyen` varchar(10) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`name`, `password`, `MaCanBo`, `MaPhanQuyen`) VALUES
('cb01', '$2y$10$uWQYq2dA0TqCdkSpB2FKEub.eBSsrkmVn8CkBq/7o9fGsKyYXmPUq', 'CB001', '03'),
('cb03', '$2y$10$GFKSvYNO6Ttw2BQxFyq/h.63Mcj0i1LCviEUZ5lGprxjUiK3DzbeG', 'CB003', '02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoansv`
--

CREATE TABLE `taikhoansv` (
  `name` varchar(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `MaSinhVien` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoansv`
--

INSERT INTO `taikhoansv` (`name`, `password`, `MaSinhVien`) VALUES
('htl', '$2y$10$gXA.DJb4BEwLrQGTFK6gEu86236IEc4xODbPkLJ5ovvgJidNRwZW.', 'B1706714'),
('ntmquyen', '$2y$10$KZY955SCgVrlnQcCrk2QuODh2LI3bjlF.n/ImbCiVrQhDNDDJTlZ2', 'B1706519');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`name`);

--
-- Chỉ mục cho bảng `bailam`
--
ALTER TABLE `bailam`
  ADD PRIMARY KEY (`IDBaiLam`),
  ADD KEY `IDDeThi` (`IDDeThi`),
  ADD KEY `name` (`name`);

--
-- Chỉ mục cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`MaBoMon`);

--
-- Chỉ mục cho bảng `canbo`
--
ALTER TABLE `canbo`
  ADD PRIMARY KEY (`MaCanBo`),
  ADD KEY `MaBoMon` (`MaBoMon`),
  ADD KEY `MaChucVu` (`MaChucVu`);

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`IDCauHoi`),
  ADD KEY `MaCanBo` (`MaCanBo`),
  ADD KEY `MaMucDo` (`MaMucDo`),
  ADD KEY `MaMonHoc` (`MaMonHoc`);

--
-- Chỉ mục cho bảng `cauhoi_bailam`
--
ALTER TABLE `cauhoi_bailam`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDBaiLam` (`IDBaiLam`),
  ADD KEY `IDCauHoi` (`IDCauHoi`);

--
-- Chỉ mục cho bảng `chitietdt`
--
ALTER TABLE `chitietdt`
  ADD PRIMARY KEY (`IDDeThi`,`IDCauHoi`),
  ADD KEY `IDCauHoi` (`IDCauHoi`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaChucVu`);

--
-- Chỉ mục cho bảng `dapan`
--
ALTER TABLE `dapan`
  ADD PRIMARY KEY (`IDDapAn`),
  ADD KEY `IDCauHoi` (`IDCauHoi`);

--
-- Chỉ mục cho bảng `dapan_bailam`
--
ALTER TABLE `dapan_bailam`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDDapAn` (`IDDapAn`),
  ADD KEY `IDCHBL` (`IDCHBL`);

--
-- Chỉ mục cho bảng `dethi`
--
ALTER TABLE `dethi`
  ADD PRIMARY KEY (`IDDeThi`),
  ADD KEY `MaCanBo` (`MaCanBo`),
  ADD KEY `MaMonHoc` (`MaMonHoc`);

--
-- Chỉ mục cho bảng `hinhanhch`
--
ALTER TABLE `hinhanhch`
  ADD PRIMARY KEY (`IDAnh`),
  ADD KEY `IDCauHoi` (`IDCauHoi`);

--
-- Chỉ mục cho bảng `hinhanhda`
--
ALTER TABLE `hinhanhda`
  ADD PRIMARY KEY (`IDAnh`),
  ADD KEY `IDDapAn` (`IDDapAn`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMonHoc`),
  ADD KEY `MaBoMon` (`MaBoMon`);

--
-- Chỉ mục cho bảng `mucdocauhoi`
--
ALTER TABLE `mucdocauhoi`
  ADD PRIMARY KEY (`MaMucDo`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MaPhanQuyen`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSinhVien`),
  ADD KEY `MaBoMon` (`MaBoMon`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`name`),
  ADD KEY `MaCanBo` (`MaCanBo`),
  ADD KEY `MaPhanQuyen` (`MaPhanQuyen`);

--
-- Chỉ mục cho bảng `taikhoansv`
--
ALTER TABLE `taikhoansv`
  ADD PRIMARY KEY (`name`),
  ADD KEY `MaSinhVien` (`MaSinhVien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bailam`
--
ALTER TABLE `bailam`
  MODIFY `IDBaiLam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `IDCauHoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT cho bảng `cauhoi_bailam`
--
ALTER TABLE `cauhoi_bailam`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `dapan`
--
ALTER TABLE `dapan`
  MODIFY `IDDapAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT cho bảng `dapan_bailam`
--
ALTER TABLE `dapan_bailam`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT cho bảng `dethi`
--
ALTER TABLE `dethi`
  MODIFY `IDDeThi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `hinhanhch`
--
ALTER TABLE `hinhanhch`
  MODIFY `IDAnh` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `hinhanhda`
--
ALTER TABLE `hinhanhda`
  MODIFY `IDAnh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bailam`
--
ALTER TABLE `bailam`
  ADD CONSTRAINT `bailam_ibfk_1` FOREIGN KEY (`IDDeThi`) REFERENCES `dethi` (`IDDeThi`) ON DELETE CASCADE,
  ADD CONSTRAINT `bailam_ibfk_2` FOREIGN KEY (`name`) REFERENCES `taikhoansv` (`name`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `canbo`
--
ALTER TABLE `canbo`
  ADD CONSTRAINT `canbo_ibfk_1` FOREIGN KEY (`MaBoMon`) REFERENCES `bomon` (`MaBoMon`) ON UPDATE CASCADE,
  ADD CONSTRAINT `canbo_ibfk_2` FOREIGN KEY (`MaChucVu`) REFERENCES `chucvu` (`MaChucVu`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `cauhoi_ibfk_1` FOREIGN KEY (`MaCanBo`) REFERENCES `canbo` (`MaCanBo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cauhoi_ibfk_2` FOREIGN KEY (`MaMucDo`) REFERENCES `mucdocauhoi` (`MaMucDo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cauhoi_ibfk_3` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cauhoi_bailam`
--
ALTER TABLE `cauhoi_bailam`
  ADD CONSTRAINT `cauhoi_bailam_ibfk_1` FOREIGN KEY (`IDBaiLam`) REFERENCES `bailam` (`IDBaiLam`) ON DELETE CASCADE,
  ADD CONSTRAINT `cauhoi_bailam_ibfk_2` FOREIGN KEY (`IDCauHoi`) REFERENCES `cauhoi` (`IDCauHoi`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdt`
--
ALTER TABLE `chitietdt`
  ADD CONSTRAINT `chitietdt_ibfk_1` FOREIGN KEY (`IDDeThi`) REFERENCES `dethi` (`IDDeThi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdt_ibfk_2` FOREIGN KEY (`IDCauHoi`) REFERENCES `cauhoi` (`IDCauHoi`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dapan`
--
ALTER TABLE `dapan`
  ADD CONSTRAINT `dapan_ibfk_1` FOREIGN KEY (`IDCauHoi`) REFERENCES `cauhoi` (`IDCauHoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dapan_bailam`
--
ALTER TABLE `dapan_bailam`
  ADD CONSTRAINT `dapan_bailam_ibfk_1` FOREIGN KEY (`IDDapAn`) REFERENCES `dapan` (`IDDapAn`) ON DELETE CASCADE,
  ADD CONSTRAINT `dapan_bailam_ibfk_2` FOREIGN KEY (`IDCHBL`) REFERENCES `cauhoi_bailam` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dethi`
--
ALTER TABLE `dethi`
  ADD CONSTRAINT `dethi_ibfk_1` FOREIGN KEY (`MaCanBo`) REFERENCES `canbo` (`MaCanBo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dethi_ibfk_2` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`MaMonHoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhanhch`
--
ALTER TABLE `hinhanhch`
  ADD CONSTRAINT `hinhanhch_ibfk_1` FOREIGN KEY (`IDCauHoi`) REFERENCES `cauhoi` (`IDCauHoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhanhda`
--
ALTER TABLE `hinhanhda`
  ADD CONSTRAINT `hinhanhda_ibfk_1` FOREIGN KEY (`IDDapAn`) REFERENCES `dapan` (`IDDapAn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`MaBoMon`) REFERENCES `bomon` (`MaBoMon`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`MaBoMon`) REFERENCES `bomon` (`MaBoMon`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaCanBo`) REFERENCES `canbo` (`MaCanBo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taikhoan_ibfk_2` FOREIGN KEY (`MaPhanQuyen`) REFERENCES `phanquyen` (`MaPhanQuyen`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoansv`
--
ALTER TABLE `taikhoansv`
  ADD CONSTRAINT `taikhoansv_ibfk_1` FOREIGN KEY (`MaSinhVien`) REFERENCES `sinhvien` (`MaSinhVien`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
