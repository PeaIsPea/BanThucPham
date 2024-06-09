-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 09:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banthucpham`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `ID_BinhLuan` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `ThoiGianBinhLuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`ID_BinhLuan`, `ID_ThanhVien`, `ID_SanPham`, `NoiDung`, `ThoiGianBinhLuan`) VALUES
(1, 1, 1002, 'Sản phẩm tuyệt vời', '2023-07-06 07:56:56'),
(2, 1, 2003, 'Chất lượng tuyệt vời', '2023-08-08 08:38:42'),
(3, 1, 1002, 'Sản phẩm sạch', '2023-08-20 21:15:49'),
(5, 1, 3015, 'Chất lượng', '2023-08-29 15:08:04'),
(7, 1, 3004, 'ngon', '2023-09-08 21:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ID_DonHang` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `CodeOrder` int(11) DEFAULT NULL,
  `GiaMua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ID_DonHang`, `ID_SanPham`, `SoLuong`, `CodeOrder`, `GiaMua`) VALUES
(84, 1002, 1, 2045, 31500),
(85, 1001, 1, 443, 47500),
(86, 3001, 2, 7592, 171000),
(87, 1003, 1, 5970, 32400),
(87, 2002, 1, 5970, 16200),
(87, 2005, 1, 5970, 18000),
(87, 3002, 1, 5970, 142500),
(88, 1001, 1, 3287, 47500),
(89, 2002, 1, 1846, 16200),
(89, 2004, 1, 1846, 17600),
(89, 3001, 1, 1846, 171000),
(89, 3005, 1, 1846, 152000),
(90, 1001, 1, 4409, 47500),
(91, 1001, 1, 6713, 47500),
(92, 2001, 1, 9897, 16200),
(93, 3001, 1, 5646, 171000),
(94, 1001, 1, 8806, 47500),
(94, 3010, 1, 8806, 152000),
(95, 3011, 1, 2596, 76000),
(96, 3008, 1, 8044, 114000),
(97, 3005, 1, 7176, 152000),
(98, 3003, 1, 6235, 380000),
(98, 3015, 3, 6235, 14250),
(99, 3003, 3, 7859, 380000),
(100, 3015, 1, 2624, 14250),
(101, 3015, 1, 2606, 14250),
(102, 3004, 1, 2927, 108000),
(103, 3010, 1, 2790, 152000),
(103, 3011, 1, 2790, 76000),
(104, 3003, 1, 2823, 380000),
(105, 3003, 2, 8373, 380000),
(105, 3010, 2, 8373, 152000),
(105, 3015, 1, 8373, 14250);

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `ID_GioHang` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietgiohang`
--

INSERT INTO `chitietgiohang` (`ID_GioHang`, `ID_SanPham`, `SoLuong`) VALUES
(1, 3011, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID_DanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(30) NOT NULL,
  `Mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`ID_DanhMuc`, `TenDanhMuc`, `Mota`) VALUES
(1, 'Rau xanh', 'Tăng cường hệ miễn dịch, điều hòa huyết áp, tốt cho hệ tiêu hóa...'),
(2, 'Củ, quả', 'Nguồn cung cấp chất xơ tự nhiên, cải thiện hệ tiêu hóa...'),
(3, 'Thịt tươi', 'Giàu dinh dưỡng, nguồn cung cấp protein...\n'),
(7, 'Thủy hải sản', 'Tận hưởng hải sản chất lượng cao tại gia đình bạn...');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `ID_DonHang` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ThoiGianLap` datetime NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `GhiChu` varchar(255) NOT NULL,
  `GiaTien` float NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `XuLy` tinyint(1) NOT NULL,
  `NguoiNhan` varchar(50) DEFAULT NULL,
  `HinhThucThanhToan` varchar(20) DEFAULT NULL,
  `CodeOrder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`ID_DonHang`, `ID_ThanhVien`, `ThoiGianLap`, `DiaChi`, `GhiChu`, `GiaTien`, `SoDienThoai`, `XuLy`, `NguoiNhan`, `HinhThucThanhToan`, `CodeOrder`) VALUES
(84, 1, '2022-09-24 16:21:42', 'Hà Nội', '', 31500, '0123456789', 1, 'Nguyễn Văn A', 'momo', 2045),
(85, 1, '2023-08-03 20:04:22', 'Hà Nội', '', 47500, '0123456789', 1, 'Nguyễn Văn A', 'cod', 443),
(86, 1, '2023-08-24 20:15:28', 'Hà Nội', '', 342000, '0123456789', 1, 'Nguyễn Văn A', 'momo', 7592),
(87, 1, '2023-08-24 20:24:56', 'Hà Nội', '', 209100, '0123456789', 1, 'Nguyễn Văn A', 'vnpay', 5970),
(88, 1, '2023-08-26 20:04:17', 'Hà Nội', '', 47500, '0123456789', 1, 'Nguyễn Văn A', 'momo', 3287),
(89, 1, '2023-08-26 20:56:17', 'Hà Nội', '', 356800, '0123456789', 1, 'Nguyễn Văn A', 'cod', 1846),
(90, 1, '2023-08-27 11:34:20', 'Hà Nội', '', 47500, '0123456789', 2, 'Nguyễn Văn A', 'vnpay', 4409),
(91, 1, '2023-08-28 20:17:45', 'Hà Nội', '', 47500, '0123456789', 1, 'Nguyễn Văn A', 'cod', 6713),
(92, 1, '2023-08-28 21:20:36', 'Hà Nội', '', 16200, '0123456789', 1, 'Nguyễn Văn A', 'cod', 9897),
(93, 1, '2023-08-28 21:21:51', 'Hà Nội', '', 171000, '0123456789', 1, 'Nguyễn Văn A', 'momo', 5646),
(94, 1, '2023-08-29 09:05:24', 'Hà Nội', '', 199500, '0123456789', 2, 'Nguyễn Văn A', 'cod', 8806),
(95, 1, '2023-08-29 09:07:13', 'Hà Nội', '', 76000, '0123456789', 1, 'Nguyễn Văn A', 'cod', 2596),
(96, 1, '2023-08-29 09:10:29', 'Hà Nội', '', 114000, '0123456789', 2, 'Nguyễn Văn A', 'bank', 8044),
(97, 1, '2023-08-29 09:12:25', 'Hà Nội', '', 152000, '0123456789', 2, 'Nguyễn Văn A', 'momo', 7176),
(98, 1, '2023-08-29 18:02:20', 'Hà Nội', '', 422750, '0362046866', 1, 'Nguyễn Văn A', 'momo', 6235),
(99, 1, '2023-08-29 19:37:06', 'Hà Nội', '', 1140000, '0362046866', 1, 'Nguyễn Văn A', 'momo', 7859),
(100, 1, '2023-08-30 08:54:17', 'Hà Nội', '', 14250, '0362046866', 1, 'Nguyễn Văn A', 'momo', 2624),
(101, 1, '2023-08-30 08:54:50', 'Hà Nội', '', 14250, '0362046866', 1, 'Nguyễn Văn A', 'vnpay', 2606),
(102, 1, '2023-09-08 21:47:52', 'Hà Nội', '', 108000, '0362046866', 1, 'Nguyễn Văn A', 'cod', 2927),
(103, 1, '2023-09-10 07:32:28', 'Hà Nội', '', 228000, '0362046866', 1, 'Nguyễn Văn A', 'bank', 2790),
(104, 1, '2023-09-10 07:35:35', 'Hà Nội', '', 380000, '0362046866', 1, 'Nguyễn Văn A', 'momo', 2823),
(105, 1, '2023-09-10 08:58:21', 'Hà Nội', '', 1078250, '0362046866', 1, 'Nguyễn Văn A', 'vnpay', 8373),
(106, 1, '2023-09-10 08:59:17', 'Hà Nội', '', 0, '0362046866', 2, 'Nguyễn Văn A', 'momo', 8404);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `ID_GioHang` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`ID_GioHang`, `ID_ThanhVien`) VALUES
(1, 1),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `momo`
--

CREATE TABLE `momo` (
  `ID_MoMo` int(11) NOT NULL,
  `PartnerCode` varchar(50) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `Amount` varchar(50) NOT NULL,
  `OrderInfo` varchar(100) NOT NULL,
  `OrderType` varchar(50) NOT NULL,
  `TransId` int(11) NOT NULL,
  `payType` varchar(50) NOT NULL,
  `CodeOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `momo`
--

INSERT INTO `momo` (`ID_MoMo`, `PartnerCode`, `OrderId`, `Amount`, `OrderInfo`, `OrderType`, `TransId`, `payType`, `CodeOrder`) VALUES
(5, 'MOMOBKUN20180529', 1692868853, '31500', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 2045),
(6, 'MOMOBKUN20180529', 1692882873, '342000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 7592),
(7, 'MOMOBKUN20180529', 1693055000, '47500', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 3287),
(8, 'MOMOBKUN20180529', 1693232468, '171000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 5646),
(9, 'MOMOBKUN20180529', 1693275093, '152000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 7176),
(10, 'MOMOBKUN20180529', 1693306862, '422750', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 6235),
(11, 'MOMOBKUN20180529', 1693312567, '1140000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 7859),
(12, 'MOMOBKUN20180529', 1693360388, '14250', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 2624),
(13, 'MOMOBKUN20180529', 1694306029, '380000', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 2823),
(14, 'MOMOBKUN20180529', 1694311095, '1078250', 'Thanh toán qua MoMo ATM', 'momo_wallet', 2147483647, 'napas', 8404);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `ID_NCC` int(11) NOT NULL,
  `TenNCC` varchar(50) NOT NULL,
  `MoTa` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `Img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`ID_NCC`, `TenNCC`, `MoTa`, `Email`, `SoDienThoai`, `DiaChi`, `Img`) VALUES
(1, 'Trang trại Hoàng Giang Agritech', 'Trang trại Hoàng Giang Agritech là một hệ thống phát triển và phân phối thực phẩm hữu cơ, với mục tiêu giúp người dùng Việt Nam có cuộc sống khỏe mạnh hơn thông qua các loại sản phẩm tự nhiên đạt chất lượng cao, vẫn giữ nguyên vị, không chất hóa học độc hại hay biến đổi gen.', 'hoanggiangagri@gmail.com', '0889283868', 'Số 04 Lê Lai, Lô 90 TT Liên Nghĩa, Đức Trọng, Lâm Đồng', 'hoanganh.jpg'),
(2, 'Trang trại rau sạch Vân Nội', 'Rau sạch Vân Nội nằm trong top trang trại rau sạch lớn nhất Việt Nam. Vân Nội tập trung cung cấp những loại sản phẩm rau chất lượng trên địa bàn thành phố Hà Nội. Trang trại này áp dụng các thành tựu khoa học và ứng dụng công nghệ hiện đại vào trồng trọt và sản xuất. Tất cả các sản phẩm của Vân Nội đều đảm bảo an toàn vệ sinh thực phẩm và được kiểm duyệt trước khi đưa đến tay người tiêu dùng.', 'vannoi@gmail.com', '0438834806', 'Thôn Đầm, Vân Nội, Đông Anh, Hà Nội', 'vannoi.jpg'),
(3, 'Trang trại Đà Lạt GAP', 'Trang trại Đà Lạt GAP được thành lập vào năm 1997, trải qua hơn 20 năm hình thành và phát triển công ty vẫn luôn giữ vững mục tiêu dẫn đầu thị trường thực phẩm Việt Nam. Năm 2009, đơn vị đã nhận được chứng chỉ Global GAP đầu tiên ở Việt Nam, đây là một chứng nhận về tiêu chuẩn thế giới và bắt đầu phát triển mạnh xuất khẩu qua nước Châu Âu, Nga, Nhật Bản, …', 'dalatgap@gmail.com', '0432000100', 'Số 94 Láng Hạ, Đống Đa, Hà Nội', 'dalatgap.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quanly`
--

CREATE TABLE `quanly` (
  `ID_QuanLy` int(11) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quanly`
--

INSERT INTO `quanly` (`ID_QuanLy`, `TenDangNhap`, `MatKhau`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ID_SanPham` int(11) NOT NULL,
  `ID_DanhMuc` int(11) NOT NULL,
  `ID_NhaCungCap` int(11) NOT NULL,
  `TenSanPham` varchar(30) NOT NULL,
  `MoTa` text NOT NULL,
  `GiaBan` float NOT NULL,
  `SoLuong` float NOT NULL,
  `Img` varchar(20) NOT NULL,
  `GiamGia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ID_SanPham`, `ID_DanhMuc`, `ID_NhaCungCap`, `TenSanPham`, `MoTa`, `GiaBan`, `SoLuong`, `Img`, `GiamGia`) VALUES
(1001, 1, 1, 'Bắp cải', '- Thực phẩm tốt cho sức khỏe, có thể chế biến thành nhiều món ăn, hương vị thơm ngon, kích thích vị giác', 50000, 99, 'caitim.jpg', 5),
(1002, 1, 1, 'Đậu leo', '- Dùng chế biến món ăn, chứa nhiều chất dinh dưỡng cần thiết, an toàn chất lượng', 35000, 100, 'dauleo.png', 5),
(1003, 1, 2, 'Cải bẹ', '- Được trồng trong môi trường sạch an toàn với người tiêu dùng, dùng để nấu canh, xào hoặc có thể dùng ăn với lẩu...', 36000, 100, 'caibe.png', 10),
(2001, 1, 1, 'Mướp đắng', '- Thực phẩm tốt cho sức khỏe, có thể chế biến được thành nhiều món ăn...', 18000, 99, 'muopdang.png', 10),
(2002, 2, 2, 'Cà chua', '- Cung cấp đầy đủ vitamin và dưỡng chất cho cơ thể\r\n- Đạt tiêu chuẩn Vietgap\r\n- Liên hệ trực tiếp để được giá sỉ tốt nhất', 18000, 100, 'cachua.png', 10),
(2003, 2, 1, 'Đu đủ', '-Món ăn lý tưởng dành cho người muốn giảm cân, sản phẩm không sử dụng thuốc trừ sâu, an toàn cho sức khỏe', 20000, 100, 'dudu.png', 10),
(2004, 2, 1, 'Bầu', '- Món ăn lý tưởng dành cho người muốn giảm cân, sản phẩm không sử dụng thuốc trừ sâu, an toàn cho sức khỏe', 20000, 100, 'bau.png', 12),
(2005, 2, 3, 'Cà rốt', '- Thực phẩm tốt cho sức khỏe, có thể chế biến thành nhiều món ăn, hương vị thơm ngon, kích thích vị giác', 20000, 100, 'carrot.jpg', 10),
(3001, 3, 1, 'Thịt lợn', '- Nguyên liệu tươi ngon, hợp vệ sinh, cung cấp nhiều dinh dưỡng cho cơ thể, chế biến được nhiều món ăn ngon', 180000, 99, 'Thitlon.png', 5),
(3002, 3, 1, 'Thịt heo xay', '-Nguyên liệu tươi ngon, hợp vệ sinh, cung cấp nhiều dinh dưỡng cho cơ thể, chế biến được nhiều món ăn ngon', 150000, 100, 'thitheoxay.png', 5),
(3003, 3, 1, 'Thịt bò', 'thơm, ngon, tròn vị', 400000, 93, 'thitbo.jpg', 5),
(3004, 3, 1, 'Thịt gà', 'thơm, ngon, tròn vị', 120000, 99, 'thitga.jpg', 10),
(3005, 7, 1, 'Cá thu', 'ngon', 160000, 100, 'cathu.jpg', 5),
(3008, 7, 3, 'Tôm sú', 'Tôm sú tươi', 120000, 100, 'tomsu.jpg', 5),
(3010, 7, 3, 'Cua Cà Mau', 'ngon', 160000, 97, 'cuacamau.jpg', 5),
(3011, 2, 1, 'Bơ', 'Bơ ngon', 80000, 98, 'bo.jpg', 5),
(3015, 1, 3, 'Rau chân vịt', '-Rau chân vịt chứa nhiều dinh dưỡng xanh cùng các chất chống oxy hóa tốt cho cơ thể. Nhờ đó mà một số hội chứng như ung thư tuyến tiền liệt, ung thư phổi, ung thư gan... có thể được hạn chế tối đa.', 15000, 94, 'rauchanvit.png', 5);

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `ID_ThanhVien` int(11) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `HoVaTen` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SoDienThoai` varchar(12) NOT NULL,
  `NgayDangKi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`ID_ThanhVien`, `TenDangNhap`, `MatKhau`, `Email`, `HoVaTen`, `DiaChi`, `SoDienThoai`, `NgayDangKi`) VALUES
(1, 'a', '202cb962ac59075b964b07152d234b70', 'nva@gmail.com', 'Nguyễn Văn A', 'Hà Nội', '0123456789', '2023-07-18'),
(4, 'b', '202cb962ac59075b964b07152d234b70', 'nvb@gmail.com', 'Nguyễn Văn B', 'Hà Nội', '0123456789', '2023-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `vnpay`
--

CREATE TABLE `vnpay` (
  `Amount` varchar(50) NOT NULL,
  `BankCode` varchar(50) NOT NULL,
  `BankTranNo` varchar(50) NOT NULL,
  `CardType` varchar(50) NOT NULL,
  `OrderInfo` varchar(100) NOT NULL,
  `PayDate` varchar(50) NOT NULL,
  `TmnCode` varchar(50) NOT NULL,
  `TransactionNo` varchar(50) NOT NULL,
  `ID_VNPay` int(11) NOT NULL,
  `CodeOrder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vnpay`
--

INSERT INTO `vnpay` (`Amount`, `BankCode`, `BankTranNo`, `CardType`, `OrderInfo`, `PayDate`, `TmnCode`, `TransactionNo`, `ID_VNPay`, `CodeOrder`) VALUES
('20910000', 'NCB', 'VNP14100978', 'ATM', 'Thanh toan GD:5970', '20230824202533', '6448J9KM', '14100978', 10, 5970),
('4750000', 'NCB', 'VNP14102267', 'ATM', 'Thanh toan GD:4409', '20230827113508', '6448J9KM', '14102267', 11, 4409),
('1425000', 'NCB', 'VNP14104554', 'ATM', 'Thanh toan GD:2606', '20230830085601', '6448J9KM', '14104554', 12, 2606);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ID_BinhLuan`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`),
  ADD KEY `ID_SanPham` (`ID_SanPham`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ID_DonHang`,`ID_SanPham`),
  ADD KEY `ID_DonHang` (`ID_DonHang`),
  ADD KEY `ID_SanPham` (`ID_SanPham`);

--
-- Indexes for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`ID_GioHang`,`ID_SanPham`),
  ADD KEY `ID_GioHang` (`ID_GioHang`),
  ADD KEY `ID_SanPham` (`ID_SanPham`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID_DanhMuc`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID_DonHang`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ID_GioHang`),
  ADD KEY `ID_ThanhVien` (`ID_ThanhVien`);

--
-- Indexes for table `momo`
--
ALTER TABLE `momo`
  ADD PRIMARY KEY (`ID_MoMo`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`ID_NCC`);

--
-- Indexes for table `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`ID_QuanLy`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID_SanPham`),
  ADD KEY `ID_NhaCungCap` (`ID_NhaCungCap`),
  ADD KEY `ID_DanhMuc` (`ID_DanhMuc`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`ID_ThanhVien`);

--
-- Indexes for table `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`ID_VNPay`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ID_BinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ID_DanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID_DonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `ID_GioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `momo`
--
ALTER TABLE `momo`
  MODIFY `ID_MoMo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `ID_NCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quanly`
--
ALTER TABLE `quanly`
  MODIFY `ID_QuanLy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3016;

--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `ID_ThanhVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `ID_VNPay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`);

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`ID_DonHang`) REFERENCES `donhang` (`ID_DonHang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`);

--
-- Constraints for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `chitietgiohang_ibfk_1` FOREIGN KEY (`ID_GioHang`) REFERENCES `giohang` (`ID_GioHang`),
  ADD CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ID_NhaCungCap`) REFERENCES `nhacungcap` (`ID_NCC`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`ID_DanhMuc`) REFERENCES `danhmuc` (`ID_DanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
