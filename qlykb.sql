-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2026 at 08:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlykb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bac_si`
--

CREATE TABLE `bac_si` (
  `ma_bac_si` int(11) NOT NULL,
  `ma_chuyen_khoa` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` enum('Nam','Nu','Khac') DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hoc_vi` varchar(100) DEFAULT NULL,
  `kinh_nghiem` int(11) DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bac_si`
--

INSERT INTO `bac_si` (`ma_bac_si`, `ma_chuyen_khoa`, `ho_ten`, `ngay_sinh`, `gioi_tinh`, `dia_chi`, `so_dien_thoai`, `email`, `hoc_vi`, `kinh_nghiem`, `hinh_anh`) VALUES
(29, 1, 'ThS Nguyễn Văn An', '1985-03-12', 'Nam', 'Hà Nội', '0901234567', 'an@gmail.com', 'Thạc sĩ', 10, 'an.png'),
(30, 2, 'BSCKI Trần Thị Bích', '1990-07-25', 'Nu', 'Hải Phòng', '0912345678', 'bich@gmail.com', 'Bác sĩ CKI', 7, 'bich.png'),
(31, 3, 'TS Lê Quang Huy', '1982-11-05', 'Nam', 'Đà Nẵng', '0923456789', 'huy@gmail.com', 'Tiến sĩ', 15, 'huy.png'),
(32, 4, 'TU.BS Phạm Thị Lan', '1993-02-18', 'Nu', 'Hà Nội', '0934567890', 'lan@gmail.com', 'Thiếu úy Bác sĩ', 5, 'lan.png'),
(33, 5, 'TS.Hoàng Minh Đức', '1988-09-30', 'Nam', 'TP Hồ Chí Minh', '0945678901', 'duc@gmail.com', 'Tiến Sĩ', 9, 'duc.png'),
(34, 6, 'BSCKI Nguyễn Thị Mai', '1991-06-14', 'Nu', 'Hà Nội', '0956789012', 'mai@gmail.com', 'Bác sĩ CKI', 8, 'mai.png'),
(35, 7, 'TS Trần Văn Khoa', '1987-01-20', 'Nam', 'Huế', '0967890123', 'khoa@gmail.com', 'Tiến Sĩ', 11, 'khoa.png'),
(36, 8, 'PGS.TS Lê Thị Hồng', '1994-10-09', 'Nu', 'Cần Thơ', '0978901234', 'hong@gmail.com', 'Phó Giáo Sư Tiến Sĩ', 23, 'hong.png'),
(37, 9, 'PGS.TS Nguyễn Văn Hùng', '1975-03-12', 'Nam', 'Hà Nội', '0912345001', 'hung.nguyen@benhvien.vn', 'Phó Giáo Sư Tiến Sĩ', 25, 'bs1.png'),
(38, 9, 'TS Trần Thị Mai', '1980-07-21', 'Nu', 'Hà Nội', '0912345002', 'mai.tran@benhvien.vn', 'Tiến Sĩ', 18, 'bs2.png'),
(39, 10, 'BSCKII Lê Hoàng Nam', '1978-05-15', 'Nam', 'Hải Phòng', '0912345003', 'nam.le@benhvien.vn', 'Bác sĩ Chuyên khoa II', 20, 'bs3.png'),
(40, 10, 'ThS.BS Phạm Minh Đức', '1983-11-02', 'Nam', 'Hà Nội', '0912345004', 'duc.pham@benhvien.vn', 'Thạc sĩ - Bác sĩ', 15, 'bs4.png'),
(41, 11, 'PGS.TS Đặng Quốc Bảo', '1972-09-18', 'Nam', 'Hà Nội', '0912345005', 'bao.dang@benhvien.vn', 'Phó Giáo Sư Tiến Sĩ', 28, 'bs5.png'),
(42, 11, 'BSCKII Nguyễn Thanh Sơn', '1979-04-10', 'Nam', 'Nam Định', '0912345006', 'son.nguyen@benhvien.vn', 'Bác sĩ Chuyên khoa II', 19, 'bs6.png'),
(43, 12, 'TS.BS Võ Anh Tuấn', '1981-06-30', 'Nam', 'TP Hồ Chí Minh', '0912345007', 'tuan.vo@benhvien.vn', 'Tiến Sĩ Bác Sĩ', 17, 'bs7.png'),
(44, 12, 'ThS.BS Lê Ngọc Hà', '1985-08-22', 'Nu', 'Hà Nội', '0912345008', 'ha.le@benhvien.vn', 'Thạc sĩ Bác sĩ', 13, 'bs8.png'),
(45, 13, 'PGS.TS Trần Quốc Khánh', '1974-01-25', 'Nam', 'Hà Nội', '0912345009', 'khanh.tran@benhvien.vn', 'Phó Giáo Sư Tiến Sĩ', 26, 'bs9.png'),
(46, 13, 'TS.BS Nguyễn Thị Lan', '1982-12-05', 'Nu', 'Hà Nội', '0912345010', 'lan.nguyen@benhvien.vn', 'Tiến Sĩ Bác Sĩ', 16, 'bs10.png'),
(47, 14, 'PGS.TS Phạm Đức Long', '1973-07-08', 'Nam', 'Hà Nội', '0912345011', 'long.pham@benhvien.vn', 'Phó Giáo Sư Tiến Sĩ', 27, 'bs11.png'),
(48, 14, 'TS.BS Hoàng Minh Quân', '1984-03-17', 'Nam', 'Bắc Ninh', '0912345012', 'quan.hoang@benhvien.vn', 'Tiến Sĩ Bác Sĩ', 14, 'bs12.png'),
(49, 15, 'PGS.TS Nguyễn Văn Bình', '1971-05-20', 'Nam', 'Hà Nội', '0912345013', 'binh.nguyen@benhvien.vn', 'Phó Giáo Sư Tiến Sĩ', 30, 'bs13.png'),
(50, 15, 'TS.BS Lê Thị Thu', '1986-09-12', 'Nu', 'Hà Nội', '0912345014', 'thu.le@benhvien.vn', 'Tiến Sĩ Bác Sĩ', 12, 'bs14.png'),
(51, 15, 'PGS.TS Trương Đức Hải', '1970-11-28', 'Nam', 'Hà Nội', '0912345015', 'hai.truong@benhvien.vn', 'Phó Giáo Sư Tiến Sĩ', 32, 'bs15.png'),
(52, 15, 'TS.BS Phạm Hồng Anh', '1983-02-14', 'Nu', 'Hà Nội', '0912345016', 'anh.pham@benhvien.vn', 'Tiến Sĩ Bác Sĩ', 15, 'bs16.png'),
(53, 3, 'PGS.TS Đinh Vĩnh Hải', '1976-03-12', 'Nam', 'Hà Nội', '0912345011', 'hai76.nguyen@benhvien.vn', 'Phó Giáo Sư Tiến Sĩ', 25, 'hai.png'),
(54, 4, 'PGS.TS Nguyễn Hải Mạnh', '1980-03-12', 'Nam', 'Hà Nội', '091234566', 'manhvni@benhvien.vn', 'Phó Giáo Sư Tiến Sĩ', 20, 'manh.png'),
(55, 1, 'PGS.TS Nông Văn Thái', '1982-06-02', 'Nam', 'Hà Nội', '0915634411', 'hai76.nguyen@benhvien.vn', 'Phó Giáo Sư Tiến Sĩ', 19, 'troc.png');

-- --------------------------------------------------------

--
-- Table structure for table `benh_nhan`
--

CREATE TABLE `benh_nhan` (
  `ma_benh_nhan` int(11) NOT NULL,
  `ma_tai_khoan` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` enum('Nam','Nu','Khac') DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nghe_nghiep` varchar(100) DEFAULT NULL,
  `so_cccd` varchar(20) DEFAULT NULL,
  `so_bao_hiem_y_te` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benh_nhan`
--

INSERT INTO `benh_nhan` (`ma_benh_nhan`, `ma_tai_khoan`, `ho_ten`, `ngay_sinh`, `gioi_tinh`, `dia_chi`, `so_dien_thoai`, `email`, `nghe_nghiep`, `so_cccd`, `so_bao_hiem_y_te`) VALUES
(1, 1, 'Lương Văn Huỳnh', '2005-10-07', 'Nam', 'Hà Nội', '0876655544', 'huynhhb@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chuyen_khoa`
--

CREATE TABLE `chuyen_khoa` (
  `ma_chuyen_khoa` int(11) NOT NULL,
  `ten_chuyen_khoa` varchar(100) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chuyen_khoa`
--

INSERT INTO `chuyen_khoa` (`ma_chuyen_khoa`, `ten_chuyen_khoa`, `mo_ta`, `hinh_anh`) VALUES
(1, 'Khoa Nội Tổng Hợp', 'Khám và điều trị các bệnh nội khoa tổng quát.', 'noi.png'),
(2, 'Khoa Ngoại Chấn Thương', 'Khám và điều trị chấn thương chỉnh hình.', 'ngoai.png'),
(3, 'Khoa Nhi', 'Khám và điều trị bệnh lý trẻ em.', 'nhi.png'),
(4, 'Khoa Sản - Phụ Khoa', 'Chăm sóc sức khỏe phụ nữ và thai sản.', 'san.png'),
(5, 'Khoa Tai Mũi Họng', 'Khám và điều trị bệnh tai mũi họng.', 'tmh.png'),
(6, 'Khoa Mắt', 'Khám và điều trị các bệnh về mắt.', 'mat.png'),
(7, 'Khoa Da Liễu', 'Khám và điều trị bệnh da liễu.', 'dalieu.png'),
(8, 'Khoa Tim Mạch', 'Khám và điều trị các bệnh tim mạch.', 'tim.png'),
(9, 'Khoa Ung Bướu', 'Khám, chẩn đoán và điều trị các bệnh ung thư bằng nhiều phương pháp hiện đại.', 'ungbuou.png'),
(10, 'Khoa Hồi Sức Cấp Cứu', 'Tiếp nhận, cấp cứu và điều trị các trường hợp bệnh nhân nguy kịch.', 'hoisuc_capcuu.png'),
(11, 'Khoa Gây Mê Hồi Sức', 'Thực hiện gây mê, gây tê và hồi sức trong các ca phẫu thuật.', 'gayme_hoisuc.png'),
(12, 'Khoa Răng Hàm Mặt', 'Khám, điều trị và chăm sóc sức khỏe răng miệng, hàm mặt.', 'ranghammat.png'),
(13, 'Khoa Xét Nghiệm - Giải Phẫu Bệnh', 'Thực hiện các xét nghiệm và chẩn đoán bệnh thông qua mẫu bệnh phẩm.', 'xetnghiem_giaiphau.png'),
(14, 'Khoa Chẩn Đoán Hình Ảnh & Thăm Dò Chức Năng', 'Chẩn đoán bệnh bằng X-quang, CT, MRI, siêu âm và các kỹ thuật thăm dò chức năng.', 'chandoan_hinhanh.png'),
(15, 'Khoa Tiêu Hóa Nội Thần Kinh', 'Khám và điều trị các bệnh lý về dạ dày, ruột, gan, mật và tụy.Khám và điều trị các bệnh lý thần kinh trung ương và ngoại biên.', 'tieuhoa.png');

-- --------------------------------------------------------

--
-- Table structure for table `lich_kham`
--

CREATE TABLE `lich_kham` (
  `ma_lich_kham` int(11) NOT NULL,
  `ma_benh_nhan` int(11) NOT NULL,
  `ma_bac_si` int(11) NOT NULL,
  `ngay_kham` date NOT NULL,
  `gio_kham` time NOT NULL,
  `trieu_chung` text DEFAULT NULL,
  `trang_thai` enum('ChoXacNhan','DaXacNhan','DaKham','DaHuy') DEFAULT 'ChoXacNhan',
  `ngay_dat` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lich_kham`
--

INSERT INTO `lich_kham` (`ma_lich_kham`, `ma_benh_nhan`, `ma_bac_si`, `ngay_kham`, `gio_kham`, `trieu_chung`, `trang_thai`, `ngay_dat`) VALUES
(1, 1, 55, '2026-06-10', '09:00:00', 'Đau', 'DaKham', '2026-06-08 15:29:25'),
(2, 1, 29, '2026-06-11', '10:00:00', 'EE', 'DaKham', '2026-06-10 12:05:06'),
(3, 1, 30, '2026-06-11', '09:00:00', 'ĐAU Quá', 'DaKham', '2026-06-10 12:08:25'),
(13, 1, 29, '2026-06-17', '09:00:00', 'đau', 'DaKham', '2026-06-10 12:32:06'),
(14, 1, 53, '2026-06-20', '14:00:00', '123', 'DaKham', '2026-06-10 12:40:42'),
(15, 1, 55, '2026-06-18', '14:00:00', 'c', 'ChoXacNhan', '2026-06-17 14:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `lien_he`
--

CREATE TABLE `lien_he` (
  `ma_lien_he` int(11) NOT NULL,
  `ho_ten` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `ngay_gui` datetime DEFAULT current_timestamp(),
  `trang_thai` varchar(50) DEFAULT 'Chưa xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lien_he`
--

INSERT INTO `lien_he` (`ma_lien_he`, `ho_ten`, `email`, `so_dien_thoai`, `noi_dung`, `ngay_gui`, `trang_thai`) VALUES
(1, 'Lương Văn Huỳnh', 'luonghuynh0710@gmail.com', '0869551212', 'TÔI LÀ TÔI', '2026-06-09 21:37:56', 'Chưa xử lý');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `ma_tai_khoan` int(11) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `vai_tro` enum('QuanTri','BacSi','BenhNhan') NOT NULL,
  `trang_thai` enum('HoatDong','Khoa') DEFAULT 'HoatDong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`ma_tai_khoan`, `ten_dang_nhap`, `mat_khau`, `vai_tro`, `trang_thai`) VALUES
(1, 'Huynh1231', '123', 'BenhNhan', 'HoatDong'),
(2, 'admin', '123456', 'QuanTri', 'HoatDong');

-- --------------------------------------------------------

--
-- Table structure for table `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `ma_tin_tuc` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `noi_dung` longtext NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `ngay_dang` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tin_tuc`
--

INSERT INTO `tin_tuc` (`ma_tin_tuc`, `tieu_de`, `noi_dung`, `hinh_anh`, `ngay_dang`) VALUES
(1, 'Lợi ích của việc khám sức khỏe định kỳ', 'Khám sức khỏe định kỳ giúp phát hiện sớm các bệnh lý tiềm ẩn trước khi xuất hiện triệu chứng. Việc kiểm tra sức khỏe thường xuyên giúp bác sĩ đánh giá tổng quát tình trạng cơ thể, tư vấn chế độ dinh dưỡng và phòng ngừa bệnh tật hiệu quả. Mỗi người nên khám sức khỏe từ 1 đến 2 lần mỗi năm để bảo vệ sức khỏe lâu dài.', 'tin1.png', '2026-06-08 21:46:16'),
(2, 'Cách phòng tránh sốt xuất huyết trong mùa mưa', 'Sốt xuất huyết là bệnh truyền nhiễm nguy hiểm do muỗi vằn truyền bệnh. Người dân cần thường xuyên vệ sinh môi trường sống, loại bỏ các vật chứa nước đọng, sử dụng màn khi ngủ và mặc quần áo dài tay. Khi có các triệu chứng sốt cao liên tục hoặc đau đầu kéo dài cần đến cơ sở y tế để được thăm khám.', 'tin2.png', '2026-06-08 21:46:16'),
(3, 'Chế độ dinh dưỡng dành cho người cao huyết áp', 'Người bị cao huyết áp nên hạn chế thực phẩm chứa nhiều muối, đồ ăn nhanh và thức uống có cồn. Nên tăng cường rau xanh, trái cây tươi, cá và các loại hạt. Việc duy trì chế độ ăn uống hợp lý kết hợp tập luyện thể thao sẽ giúp kiểm soát huyết áp hiệu quả.', 'tin3.png', '2026-06-08 21:46:16'),
(4, 'Những dấu hiệu cảnh báo sớm bệnh tim mạch', 'Các dấu hiệu cảnh báo bệnh tim mạch bao gồm đau tức ngực, khó thở, tim đập nhanh, chóng mặt hoặc mệt mỏi kéo dài. Việc khám sức khỏe định kỳ và duy trì lối sống lành mạnh sẽ giúp phát hiện và phòng ngừa bệnh tim mạch hiệu quả.', 'tin4.png', '2026-06-08 21:46:16'),
(5, 'Bảo vệ sức khỏe trong những ngày nắng nóng', 'Thời tiết nắng nóng kéo dài có thể gây mất nước và ảnh hưởng đến sức khỏe. Người dân nên uống đủ nước, hạn chế ra ngoài vào thời điểm nắng gắt và sử dụng các biện pháp chống nắng phù hợp. Khi có dấu hiệu kiệt sức cần nghỉ ngơi và đến cơ sở y tế nếu cần.', 'tin5.png', '2026-06-08 21:46:16'),
(6, 'Tiêm vắc xin giúp bảo vệ sức khỏe cộng đồng', 'Vắc xin giúp phòng ngừa nhiều bệnh truyền nhiễm nguy hiểm. Việc tiêm chủng đầy đủ không chỉ bảo vệ bản thân mà còn góp phần tạo miễn dịch cộng đồng, hạn chế sự lây lan của dịch bệnh. Người dân nên tuân thủ lịch tiêm chủng theo khuyến cáo của ngành y tế.', 'tin6.png', '2026-06-08 21:46:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bac_si`
--
ALTER TABLE `bac_si`
  ADD PRIMARY KEY (`ma_bac_si`),
  ADD KEY `ma_chuyen_khoa` (`ma_chuyen_khoa`);

--
-- Indexes for table `benh_nhan`
--
ALTER TABLE `benh_nhan`
  ADD PRIMARY KEY (`ma_benh_nhan`),
  ADD KEY `fk_benhnhan_taikhoan` (`ma_tai_khoan`);

--
-- Indexes for table `chuyen_khoa`
--
ALTER TABLE `chuyen_khoa`
  ADD PRIMARY KEY (`ma_chuyen_khoa`);

--
-- Indexes for table `lich_kham`
--
ALTER TABLE `lich_kham`
  ADD PRIMARY KEY (`ma_lich_kham`),
  ADD KEY `fk_lichkham_benhnhan` (`ma_benh_nhan`),
  ADD KEY `fk_lichkham_bacsi` (`ma_bac_si`);

--
-- Indexes for table `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`ma_lien_he`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`ma_tai_khoan`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- Indexes for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`ma_tin_tuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bac_si`
--
ALTER TABLE `bac_si`
  MODIFY `ma_bac_si` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `benh_nhan`
--
ALTER TABLE `benh_nhan`
  MODIFY `ma_benh_nhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chuyen_khoa`
--
ALTER TABLE `chuyen_khoa`
  MODIFY `ma_chuyen_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lich_kham`
--
ALTER TABLE `lich_kham`
  MODIFY `ma_lich_kham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `ma_lien_he` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `ma_tai_khoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `ma_tin_tuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bac_si`
--
ALTER TABLE `bac_si`
  ADD CONSTRAINT `fk_bacsi_chuyenkhoa` FOREIGN KEY (`ma_chuyen_khoa`) REFERENCES `chuyen_khoa` (`ma_chuyen_khoa`);

--
-- Constraints for table `benh_nhan`
--
ALTER TABLE `benh_nhan`
  ADD CONSTRAINT `fk_benhnhan_taikhoan` FOREIGN KEY (`ma_tai_khoan`) REFERENCES `tai_khoan` (`ma_tai_khoan`);

--
-- Constraints for table `lich_kham`
--
ALTER TABLE `lich_kham`
  ADD CONSTRAINT `fk_lichkham_bacsi` FOREIGN KEY (`ma_bac_si`) REFERENCES `bac_si` (`ma_bac_si`),
  ADD CONSTRAINT `fk_lichkham_benhnhan` FOREIGN KEY (`ma_benh_nhan`) REFERENCES `benh_nhan` (`ma_benh_nhan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
