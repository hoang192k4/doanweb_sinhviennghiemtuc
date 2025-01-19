-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 19, 2025 lúc 04:10 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sinhviennghiemtuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `facebook` char(255) NOT NULL,
  `youtube` char(255) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` char(255) NOT NULL,
  `address` text NOT NULL,
  `logo` char(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `name`, `facebook`, `youtube`, `phone`, `email`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Sinh  Viên Nghiêm Túc', 'http://www.facebook.com.vn', 'https://www.youtube.com.vn', '0283821286', 'ktcaothang@caothang.edu.vn', 'truong cao dang ky thuat cao thang', 'logo.png', '2024-11-30 05:17:55', '2025-01-11 01:02:22');

--
-- Bẫy `about`
--
DELIMITER $$
CREATE TRIGGER `about_Updated_At` BEFORE UPDATE ON `about` FOR EACH ROW SET NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` char(255) NOT NULL,
  `content` text NOT NULL,
  `text_plan` text NOT NULL,
  `image` char(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `content`, `text_plan`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hướng Dẫn Mua Điện Thoại Thông Minh', 'huong-dan-mua-dien-thoai-thong-minh', 'Trong bài viết này, chúng tôi sẽ hướng dẫn bạn cách chọn mua điện thoại thông minh phù hợp với nhu cầu sử dụng của mình...', 'Hướng dẫn mua điện thoại thông minh, chọn mua điện thoại tốt, các yếu tố chọn điện thoại', '', 1, '2024-11-30 04:50:06', '2024-11-30 04:50:06'),
(2, 'Đánh Giá Laptop Dell XPS 13', 'danh-gia-laptop-dell-xps-13', 'Laptop Dell XPS 13 là một trong những mẫu laptop cao cấp, với thiết kế sang trọng, cấu hình mạnh mẽ và màn hình sắc nét...', 'Đánh giá Dell XPS 13, laptop cao cấp, laptop tốt nhất cho công việc', '', 1, '2024-11-30 04:50:06', '2024-11-30 04:50:06'),
(3, 'Top 5 Tai Nghe Không Dây Tốt Nhất 2024', 'top-5-tai-nghe-khong-day-tot-nhat-2024', 'Trong năm 2024, tai nghe không dây tiếp tục thống trị thị trường công nghệ. Dưới đây là 5 mẫu tai nghe không dây tốt nhất...', 'Tai nghe không dây, top tai nghe tốt nhất 2024, tai nghe nghe nhạc hay', '', 1, '2024-11-30 04:50:06', '2024-11-30 04:50:06'),
(4, 'Chia Sẻ Kinh Nghiệm Sử Dụng Máy Ảnh Sony A7 III', 'chia-se-kinh-nghiem-su-dung-may-anh-sony-a7-iii', 'Máy ảnh Sony A7 III là lựa chọn tuyệt vời cho những người đam mê nhiếp ảnh. Bài viết này sẽ chia sẻ kinh nghiệm khi sử dụng...', 'Kinh nghiệm sử dụng máy ảnh Sony, đánh giá máy ảnh Sony A7 III, nhiếp ảnh', '', 1, '2024-11-30 04:50:06', '2024-11-30 04:50:06');

--
-- Bẫy `blogs`
--
DELIMITER $$
CREATE TRIGGER `Blogs_Updated_At` BEFORE UPDATE ON `blogs` FOR EACH ROW SET NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` char(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'Apple.webp', 1, 1, '2024-11-30 04:33:17', '2025-01-11 07:55:27'),
(2, 'Samsung', 'SamSung.webp', 1, 1, '2024-11-30 04:33:17', '2025-01-11 07:55:43'),
(3, 'Xiaomi', 'Xiaomi.webp', 1, 1, '2024-11-30 04:33:17', '2025-01-11 07:56:01'),
(4, 'Dell', 'Dell.webp', 1, 2, '2024-11-30 04:33:17', '2025-01-11 07:56:11'),
(5, 'Apple', 'Apple.webp', 1, 2, '2024-11-30 04:33:17', '2025-01-11 07:58:54'),
(6, 'Asus', 'Asus.webp', 1, 2, '2024-11-30 04:33:17', '2025-01-11 07:56:26'),
(18, 'Realme', 'Realme.webp', 1, 1, '2025-01-11 08:00:07', '2025-01-11 08:01:16'),
(19, 'MSI', 'Msi.webp', 1, 2, '2025-01-11 08:00:34', '2025-01-11 08:01:17'),
(20, 'HP', 'Hp.webp', 1, 2, '2025-01-11 08:01:44', '2025-01-11 08:01:44'),
(21, 'Lenovo', 'Lenovo.webp', 1, 2, '2025-01-11 08:05:06', '2025-01-11 08:05:06');

--
-- Bẫy `brands`
--
DELIMITER $$
CREATE TRIGGER `Brands_Updated_At` BEFORE UPDATE ON `brands` FOR EACH ROW SET NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` char(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Điện Thoại', 'dien-thoai', 1, '2024-11-29 15:15:33', '2025-01-02 02:58:22'),
(2, 'Laptop', 'laptop', 1, '2024-11-30 04:31:43', '2025-01-02 02:58:25');

--
-- Bẫy `categories`
--
DELIMITER $$
CREATE TRIGGER `Categories_Updated_At` BEFORE UPDATE ON `categories` FOR EACH ROW SET NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_specifications`
--

CREATE TABLE `category_specifications` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_specifications`
--

INSERT INTO `category_specifications` (`id`, `category_id`, `name`) VALUES
(1, 1, 'Màn hình'),
(3, 1, 'Công nghệ màn hình'),
(4, 1, 'Độ phân giải'),
(7, 1, 'Chipset'),
(8, 1, 'Ram'),
(9, 1, 'Camera'),
(10, 1, 'Hệ điều hành'),
(12, 1, 'Kích thước sản phẩm'),
(14, 1, 'Ngày ra mắt'),
(17, 2, 'Màn hình'),
(18, 2, 'Công nghệ màn hình'),
(19, 2, 'Độ phân giải'),
(20, 2, 'Chipset'),
(21, 2, 'Ram'),
(22, 2, 'Camera'),
(23, 2, 'Hệ điều hành'),
(24, 2, 'Kích thước sản phẩm'),
(25, 2, 'Ngày ra mắt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat_details`
--

CREATE TABLE `chat_details` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `room_chat_id` int(11) NOT NULL,
  `user_send` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `email` char(255) NOT NULL,
  `phone` char(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `content`, `email`, `phone`, `status`, `created_at`, `updated_at`, `name`) VALUES
(6, 'tieu de test', 'noi dung test', 'vanA@gmail.com', '0123456789', 1, '2025-01-10 18:20:59', '2025-01-11 01:21:20', 'Nguyen van a'),
(7, 'sdafsasdf', 'jbsf', 'pan58858@gmail.com', '0375330740', 0, '2025-01-13 18:14:17', '2025-01-13 18:14:17', 'Nguyen truong Giang'),
(8, 'Tiêu đề nho nhỏ test chức năng thêm liên hệ', 'Nội dung test chức năng thêm liên hệ', 'dong@gmail.com', '0392148597', 0, '2025-01-14 06:38:01', '2025-01-14 06:38:01', 'Đặng Khánh Đông'),
(9, 'trang thanh toán không thực hiện được', 'không bấm thanh toán đc', 'pan58858@gmail.com', '0375330740', 0, '2025-01-14 11:04:26', '2025-01-14 11:04:26', 'Nguyen truong Giang'),
(10, 'Tiêu đề test chức năng thêm liên hệ', 'Nội dung test chức năng thêm liên hệ', 'do@gmail.com', '0963838868', 0, '2025-01-15 01:51:13', '2025-01-15 01:51:13', 'Nguyễn Quốc Đô'),
(11, 'Tiêu đề test chức năng thêm liên hệ', 'Nội dung test chức năng thêm liên hệ', 'kiet@gmail.com', '0963838868', 1, '2025-01-15 01:51:49', '2025-01-16 11:20:33', 'Nguyễn Bá Kiệt'),
(12, 'Tiêu đề test chức năng thêm liên hệ', 'Nội dung test chức năng thêm liên hệ', 'hoang@gmail.com', '0963791178', 1, '2025-01-15 01:52:31', '2025-01-16 11:20:31', 'Nguyễn Ngọc Hoàng');

--
-- Bẫy `contacts`
--
DELIMITER $$
CREATE TRIGGER `contacts_Updated_At` BEFORE UPDATE ON `contacts` FOR EACH ROW SET NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_products`
--

CREATE TABLE `image_products` (
  `id` int(11) NOT NULL,
  `image` char(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_products`
--

INSERT INTO `image_products` (`id`, `image`, `product_id`) VALUES
(1, 'product_01737297436.webp', 1),
(2, 'product_11736584291.jpg', 1),
(9, 'product_01736584476.jpg', 5),
(10, 'product_11736584476.jpg', 5),
(62, 'product_01736585014.jpg', 42),
(63, 'product_01737297138.webp', 43),
(64, 'product_01736585705.jpg', 44),
(65, 'product_01736586157.jpg', 45),
(66, 'product_01736586573.jpg', 46),
(67, 'product_01736586954.jpg', 47),
(68, 'product_01736587301.jpg', 48),
(69, 'product_01736587553.jpg', 49),
(70, 'product_01736587994.jpg', 50),
(71, 'product_01736588292.jpg', 51),
(72, 'product_01736588645.jpg', 52),
(73, 'product_01736588882.jpg', 53),
(74, 'product_01736589208.jpg', 54),
(75, 'product_01736589469.jpg', 55),
(76, 'product_01736589657.jpg', 56),
(77, 'product_01736590097.jpg', 57),
(78, 'product_01736590702.jpg', 58),
(79, 'product_01736590903.jpg', 59),
(80, 'product_01737115395.jpg', 60),
(81, 'product_01737116861.jpg', 61),
(82, 'product_01737117395.jpg', 62),
(83, 'product_01737117735.jpg', 63),
(84, 'product_01737118054.jpg', 64),
(85, 'product_01737118626.png', 65),
(86, 'product_01737119559.jpg', 66),
(87, 'product_11737119559.jpg', 66),
(88, 'product_21737119559.jpg', 66),
(89, 'product_31737119559.jpg', 66),
(90, 'product_01737119965.png', 67),
(91, 'product_01737120139.png', 68),
(92, 'product_01737120736.jpg', 69),
(93, 'product_11737120736.jpg', 69);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_ratings`
--

CREATE TABLE `image_ratings` (
  `id` int(11) NOT NULL,
  `image` char(255) NOT NULL,
  `rating_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_ratings`
--

INSERT INTO `image_ratings` (`id`, `image`, `rating_id`) VALUES
(1, 'ratings_11737299370.jpeg', 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_products`
--

CREATE TABLE `like_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_code` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` text NOT NULL,
  `total_price` int(20) NOT NULL DEFAULT 0,
  `payment_method` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `order_status_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `full_name`, `phone`, `address`, `total_price`, `payment_method`, `user_id`, `voucher_id`, `order_status_id`, `created_at`, `updated_at`) VALUES
(1, '24113016340600', 'Nguyễn Văn C', '0306221000', 'Số 1 tôn đức thắng ', 57500000, 1, 11, NULL, 6, '2024-11-30 09:34:06', '2024-12-04 14:54:59'),
(3, '24113016340601', 'Nguyễn Văn C', '0306221000', 'Số 1 tôn đức thắng ', 57500000, 1, 11, NULL, 6, '2024-11-30 09:34:06', '2024-12-04 14:54:59'),
(5, '24113016340603', 'Nguyễn Văn C', '0306221000', 'Số 1 tôn đức thắng ', 57500000, 1, 11, NULL, 6, '2024-11-30 09:34:06', '2024-12-04 14:54:59'),
(6, '25011413555939', 'Nguyễn Trường Giang', '0765984134', 'Lũy Bán Bích, Phường Tân Thới Hòa, Quận Tân Phú, Hồ Chí Minh', 24969000, 1, 15, NULL, 6, '2025-01-14 13:55:59', '2025-01-14 13:55:59'),
(7, '25011414011858', 'Nguyễn Trường Giang', '0765984134', '44/11 Lũy Bán bích, Phường Tân Thới Hòa, Quận Tân Phú, Hồ Chí Minh', 24969000, 1, 15, NULL, 6, '2025-01-14 14:01:18', '2025-01-14 14:01:18'),
(8, '25011414041266', 'Nguyễn Trường Giang', '0765984134', '77 nguyễn hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 24969000, 1, 15, NULL, 9, '2025-01-14 14:04:12', '2025-01-14 14:04:12'),
(9, '25011418183114', 'Nguyễn Trường Giang', '0765984134', 'nguyễn hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 26690000, 1, 15, NULL, 9, '2025-01-14 18:18:31', '2025-01-14 18:18:31'),
(10, '25011507242893', 'Nguyễn Trường Giang', '0765984134', '7 nguyễn Hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 7, '2025-01-15 07:24:28', '2025-01-15 07:24:28'),
(11, '25011507243339', 'Nguyễn Trường Giang', '0765984134', '77 nguyễn Hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 6, '2025-01-15 07:24:33', '2025-01-15 07:24:33'),
(12, '25011507245311', 'Nguyễn Trường Giang', '0765984134', '77 nguyễn Hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 7, '2025-01-15 07:24:53', '2025-01-15 07:24:53'),
(13, '25011507245725', 'Nguyễn Trường Giang', '0765984134', 'nguyễn Hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 6, '2025-01-15 07:24:57', '2025-01-15 07:24:57'),
(14, '25011507250379', 'Nguyễn Trường Giang', '0765984134', 'nguyễn Hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 7, '2025-01-15 07:25:03', '2025-01-15 07:25:03'),
(15, '25011507252641', 'Nguyễn Trường Giang', '0765984134', 'Nguyễn hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 6, '2025-01-15 07:25:26', '2025-01-15 07:25:26'),
(16, '25011507252822', 'Nguyễn Trường Giang', '0765984134', 'Nguyễn hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 7, '2025-01-15 07:25:28', '2025-01-15 07:25:28'),
(17, '25011507252937', 'Nguyễn Trường Giang', '0765984134', 'Nguyễn hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 6, '2025-01-15 07:25:29', '2025-01-15 07:25:29'),
(18, '25011507252949', 'Nguyễn Trường Giang', '0765984134', 'Nguyễn hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 5, '2025-01-15 07:25:29', '2025-01-15 07:25:29'),
(19, '25011507261842', 'Nguyễn Trường Giang', '0765984134', 'Nguyễn hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 7, '2025-01-15 07:26:18', '2025-01-15 07:26:18'),
(20, '25011507262085', 'Nguyễn Trường Giang', '0765984134', 'Nguyễn hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 7, '2025-01-15 07:26:20', '2025-01-15 07:26:20'),
(21, '25011507265444', 'Nguyễn Trường Giang', '0765984134', 'Nguyễn hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 7, '2025-01-15 07:26:54', '2025-01-15 07:26:54'),
(22, '25011507265542', 'Nguyễn Trường Giang', '0765984134', 'Nguyễn hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 7, '2025-01-15 07:26:55', '2025-01-15 07:26:55'),
(23, '25011507265621', 'Nguyễn Trường Giang', '0765984134', 'Nguyễn hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 5, '2025-01-15 07:26:56', '2025-01-15 07:26:56'),
(24, '25011507274412', 'Nguyễn Trường Giang', '0765984134', 'nguyen huu tien, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 2, 15, NULL, 7, '2025-01-15 07:27:44', '2025-01-15 07:27:44'),
(25, '25011507274564', 'Nguyễn Trường Giang', '0765984134', 'nguyen huu tien, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 2, 15, NULL, 7, '2025-01-15 07:27:45', '2025-01-15 07:27:45'),
(26, '25011507274523', 'Nguyễn Trường Giang', '0765984134', 'nguyen huu tien, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 2, 15, NULL, 7, '2025-01-15 07:27:45', '2025-01-15 07:27:45'),
(27, '25011507274592', 'Nguyễn Trường Giang', '0765984134', 'nguyen huu tien, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 2, 15, NULL, 6, '2025-01-15 07:27:45', '2025-01-15 07:27:45'),
(28, '25011507274568', 'Nguyễn Trường Giang', '0765984134', 'nguyen huu tien, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 2, 15, NULL, 7, '2025-01-15 07:27:45', '2025-01-15 07:27:45'),
(29, '25011507274654', 'Nguyễn Trường Giang', '0765984134', 'nguyen huu tien, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 2, 15, NULL, 7, '2025-01-15 07:27:46', '2025-01-15 07:27:46'),
(30, '25011507274614', 'Nguyễn Trường Giang', '0765984134', 'nguyen huu tien, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 22690000, 2, 15, NULL, 7, '2025-01-15 07:27:46', '2025-01-15 07:27:46'),
(31, '25011507315049', 'Nguyễn Trường Giang', '0765984134', '44/13 luy ban bich, Phường Tân Thới Hòa, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 7, '2025-01-15 07:31:50', '2025-01-15 07:31:50'),
(32, '25011507315437', 'Nguyễn Trường Giang', '0765984134', '44/13 luy ban bich, Phường Tân Thới Hòa, Quận Tân Phú, Hồ Chí Minh', 22690000, 1, 15, NULL, 7, '2025-01-15 07:31:54', '2025-01-15 07:31:54'),
(33, '25011507511877', 'Nguyễn Trường Giang', '0765984134', 'nguyen huu tien, Phường Tân Phú, Quận Cái Răng, Cần Thơ', 18990000, 1, 15, NULL, 7, '2025-01-15 07:51:18', '2025-01-15 07:51:18'),
(34, '25011507512777', 'Nguyễn Trường Giang', '0765984134', 'nguyen huu tien, Phường Tân Phú, Quận Cái Răng, Cần Thơ', 18990000, 1, 15, NULL, 5, '2025-01-15 07:51:27', '2025-01-15 07:51:27'),
(35, '25011507552540', 'Nguyễn Trường Giang', '0765984134', 'nguyen huu tien, Phường Tân Thới Hòa, Quận Tân Phú, Hồ Chí Minh', 18990000, 1, 15, NULL, 7, '2025-01-15 07:55:25', '2025-01-15 07:55:25'),
(36, '25011511261668', 'Nguyễn Trường Giang', '0765984134', 'luy ban bich, Xã Tân Khánh Đông, Thành phố Sa Đéc, Đồng Tháp', 15290000, 1, 15, NULL, 7, '2025-01-15 11:26:16', '2025-01-15 11:26:16'),
(37, '25011603580165', 'Nguyễn Trường Giang', '0765984134', '44/13 Lũy Bán Bích, Phường Tân Thới Hòa, Quận Tân Phú, Hồ Chí Minh', 15290000, 1, 15, NULL, 6, '2025-01-16 03:58:01', '2025-01-16 03:58:01'),
(38, '25011713374581', 'Nguyễn Trường Giang', '0765984134', '44/13 Lũy Bán Bích, Phường Tân Thới Hòa, Quận Tân Phú, Hồ Chí Minh', 51790000, 1, 15, NULL, 6, '2025-01-17 13:37:45', '2025-01-17 13:37:45'),
(39, '25011713402214', 'Nguyễn Trường Giang', '0765984134', '44/13 Lũy bán bích, Phường Tân Thới Hòa, Quận Tân Phú, Hồ Chí Minh', 4790000, 1, 15, NULL, 6, '2025-01-17 13:40:22', '2025-01-17 13:40:22'),
(40, '25011713410804', 'Nguyễn Trường Giang', '0765984134', '44/11 Lũy Bán bích, Phường Tân Thới Hòa, Quận Tân Phú, Hồ Chí Minh', 54990000, 2, 15, NULL, 6, '2025-01-17 13:41:08', '2025-01-17 13:41:08'),
(41, '25011713460017', 'Nguyễn Ngọc Hoàng', '0369585731', '77 nguyễn Hữu Tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 55490000, 1, 16, NULL, 6, '2025-01-17 13:46:00', '2025-01-17 13:46:00'),
(42, '25011713462967', 'Nguyễn Ngọc Hoàng', '0369585731', '77 Nguyễn Hữu TIến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 51790000, 1, 16, NULL, 6, '2025-01-17 13:46:29', '2025-01-17 13:46:29'),
(43, '25011713474724', 'Nguyễn Quốc Đô', '0362636315', '77 Nguyễn Hữu tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 121989999, 1, 12, NULL, 6, '2025-01-17 13:47:47', '2025-01-17 13:47:47'),
(44, '25011714235179', 'Phan Thành Long', '0823654596', '77 nguyễn Hữu Tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 51790000, 1, 14, NULL, 2, '2025-01-17 14:23:51', '2025-01-17 14:23:51'),
(45, '25011714260079', 'Phan Thành Long', '0823654596', '44/11 Lũy Bán Bích, Phường Tân Thới Hòa, Quận Tân Phú, Hồ Chí Minh', 55490000, 1, 14, NULL, 5, '2025-01-17 14:26:00', '2025-01-17 14:26:00'),
(46, '25011714263511', 'Phan Thành Long', '0823654596', '77 nguyen huu tien, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 54990000, 1, 14, NULL, 2, '2025-01-17 14:26:35', '2025-01-17 14:26:35'),
(47, '25011714282659', 'Nguyễn Quốc Đô', '0362636315', '182 ấp long thạnh A,, Xã Long Khánh A, Huyện Hồng Ngự, Đồng Tháp', 26590000, 1, 12, NULL, 6, '2025-01-17 14:28:26', '2025-01-17 14:28:26'),
(48, '25011714294061', 'Nguyễn Thùy Anh Thư', '0123456785', '77 Nguyễn Hũu Tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 619999990, 2, 11, NULL, 6, '2025-01-17 14:29:40', '2025-01-17 14:29:40'),
(49, '25011714312135', 'Nguyễn Thùy Anh Thư', '0123456785', '77 Nguyễn Hữu Tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 274950000, 2, 11, NULL, 5, '2025-01-17 14:31:21', '2025-01-17 14:31:21'),
(50, '25011714332422', 'Nguyễn Quốc Đô', '0362636315', '77 Nguyen huu tien, Xã Hòa Định, Huyện Chợ Gạo, Tiền Giang', 16190000, 1, 12, NULL, 6, '2025-01-17 14:33:24', '2025-01-17 14:33:24'),
(51, '25011714342178', 'Nguyễn Quốc Đô', '0362636315', '99 Nguyễn Hữu TIến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 371999994, 1, 12, NULL, 5, '2025-01-17 14:34:21', '2025-01-17 14:34:21'),
(52, '25011714345990', 'Nguyễn Quốc Đô', '0362636315', '99 Nguyễn Hữu Tiến, Phường Tân Thới Hòa, Quận Tân Phú, Hồ Chí Minh', 27990000, 2, 12, NULL, 2, '2025-01-17 14:34:59', '2025-01-17 14:34:59'),
(53, '25011714361520', 'Nguyễn Ngọc Hoàng', '0369585731', '19 nguyễn Hữu TIến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 277450000, 1, 16, NULL, 5, '2025-01-17 14:36:15', '2025-01-17 14:36:15'),
(54, '25011714370042', 'Nguyễn Ngọc Hoàng', '0369585731', '182 Nguyễn Hữu TIến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh', 17490000, 1, 16, NULL, 2, '2025-01-17 14:37:00', '2025-01-17 14:37:00'),
(55, '25011915045540', 'Nguyễn Ngọc Hoàng', '0369585731', 'asf, Xã An Hòa, Huyện An Lão, Bình Định', 55, 1, 16, NULL, 2, '2025-01-19 15:05:07', '2025-01-19 15:05:07'),
(56, '25011915072672', 'Nguyễn Ngọc Hoàng', '0369585731', 'afd, Xã Bình Ba, Huyện Châu Đức, Bà Rịa - Vũng Tàu', 348566000, 1, 16, 4, 6, '2025-01-19 15:07:42', '2025-01-19 15:07:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `product_variant_id` int(11) DEFAULT NULL,
  `slug_product` varchar(255) NOT NULL,
  `name_product` char(255) NOT NULL,
  `color` varchar(30) NOT NULL,
  `internal_memory` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(20) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `product_variant_id`, `slug_product`, `name_product`, `color`, `internal_memory`, `quantity`, `price`, `total_price`, `order_id`, `status`) VALUES
(3, 1, 'iphone-15', 'Iphone 15', 'Màu đen', '128GB', 1, 20000000, 20000000, 1, 0),
(6, 68, 'samsung-galaxy-z-flip6-5g', 'Samsung Galaxy Z Flip6 5G', 'Màu Grey', '512 GB', 1, 24969000, 24969000, 6, 1),
(7, 68, 'samsung-galaxy-z-flip6-5g', 'Samsung Galaxy Z Flip6 5G', 'Màu Grey', '512 GB', 1, 24969000, 24969000, 7, 1),
(8, 68, 'samsung-galaxy-z-flip6-5g', 'Samsung Galaxy Z Flip6 5G', 'Màu Grey', '512 GB', 1, 24969000, 24969000, 8, 1),
(9, 64, 'iphone-15-promax', 'iphone 15 Promax', 'Màu Grey', '256 GB', 1, 26690000, 26690000, 9, 0),
(10, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 10, 0),
(11, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 11, 0),
(12, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 12, 0),
(13, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 13, 0),
(14, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 14, 0),
(15, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 15, 0),
(16, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 16, 0),
(17, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 17, 0),
(18, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 18, 0),
(19, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 19, 0),
(20, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 20, 0),
(21, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 21, 0),
(22, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 22, 0),
(23, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 23, 0),
(24, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 24, 0),
(25, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 25, 0),
(26, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 26, 0),
(27, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 27, 0),
(28, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 28, 0),
(29, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 29, 0),
(30, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 30, 0),
(31, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 31, 0),
(32, 1, 'iphone-15-plus', 'iPhone 15 Plus', 'Màu xanh', '128GB', 1, 22690000, 22690000, 32, 0),
(33, 66, 'iphone-15', 'iphone 15', 'Màu hồng', '128 GB', 1, 18990000, 18990000, 33, 0),
(34, 66, 'iphone-15', 'iphone 15', 'Màu hồng', '128 GB', 1, 18990000, 18990000, 34, 0),
(35, 66, 'iphone-15', 'iphone 15', 'Màu hồng', '128 GB', 1, 18990000, 18990000, 35, 0),
(36, 71, 'xiaomi-14t-pro-5g', 'Xiaomi 14T Pro 5G', 'Màu blue', '256 GB', 1, 15290000, 15290000, 36, 0),
(37, 71, 'xiaomi-14t-pro-5g', 'Xiaomi 14T Pro 5G', 'Màu blue', '256 GB', 1, 15290000, 15290000, 37, 0),
(38, 96, 'laptop-hp-spectre-x360-14-eu0050tu-ultra-7-155h', 'Laptop HP Spectre X360 14 eu0050TU Ultra 7 155H', 'Xanh(Blue)', '1TB', 1, 51790000, 51790000, 38, 0),
(39, 97, 'redmi-note-14', 'Redmi Note 14', 'Đen', '128GB', 1, 4790000, 4790000, 39, 0),
(40, 94, 'laptop-dell-xps-13-9340-ultra-7-155h', 'Laptop Dell XPS 13 9340 Ultra 7 155H', 'Bạc', '512GB', 1, 54990000, 54990000, 40, 0),
(41, 95, 'laptop-hp-omen-16-xf0070ax-r9-7940hs', 'Laptop HP OMEN 16 xf0070AX R9 7940HS', 'Đen', '1TB', 1, 55490000, 55490000, 41, 0),
(42, 96, 'laptop-hp-spectre-x360-14-eu0050tu-ultra-7-155h', 'Laptop HP Spectre X360 14 eu0050TU Ultra 7 155H', 'Xanh(Blue)', '1TB', 1, 51790000, 51790000, 42, 0),
(43, 91, 'laptop-macbook-pro-14-inch-m4-pro', 'Laptop MacBook Pro 14 inch M4 Pro', 'Màu black', '512 GB', 1, 59990000, 59990000, 43, 0),
(44, 92, 'laptop-macbook-pro-14-inch-m4-pro', 'Laptop MacBook Pro 14 inch M4 Pro', 'Màu Grey', '1 TB', 1, 61999999, 61999999, 43, 0),
(45, 96, 'laptop-hp-spectre-x360-14-eu0050tu-ultra-7-155h', 'Laptop HP Spectre X360 14 eu0050TU Ultra 7 155H', 'Xanh(Blue)', '1TB', 1, 51790000, 51790000, 44, 0),
(46, 95, 'laptop-hp-omen-16-xf0070ax-r9-7940hs', 'Laptop HP OMEN 16 xf0070AX R9 7940HS', 'Đen', '1TB', 1, 55490000, 55490000, 45, 0),
(47, 94, 'laptop-dell-xps-13-9340-ultra-7-155h', 'Laptop Dell XPS 13 9340 Ultra 7 155H', 'Bạc', '512GB', 1, 54990000, 54990000, 46, 0),
(48, 107, 'dien-thoai-samsung-galaxy-s24-ultra-5g', 'Điện thoại Samsung Galaxy S24 Ultra 5G', 'Tím', '512GB', 1, 26590000, 26590000, 47, 0),
(49, 92, 'laptop-macbook-pro-14-inch-m4-pro', 'Laptop MacBook Pro 14 inch M4 Pro', 'Màu Grey', '1 TB', 10, 61999999, 619999990, 48, 0),
(50, 94, 'laptop-dell-xps-13-9340-ultra-7-155h', 'Laptop Dell XPS 13 9340 Ultra 7 155H', 'Bạc', '512GB', 5, 54990000, 274950000, 49, 0),
(51, 72, 'xiaomi-14t-pro-5g', 'Xiaomi 14T Pro 5G', 'Màu black', '512 GB', 1, 16190000, 16190000, 50, 0),
(52, 92, 'laptop-macbook-pro-14-inch-m4-pro', 'Laptop MacBook Pro 14 inch M4 Pro', 'Màu Grey', '1 TB', 6, 61999999, 371999994, 51, 0),
(53, 87, 'laptop-msi-gaming-katana-15-b13vfk', 'Laptop MSI Gaming Katana 15 B13VFK', 'Màu đen', '1 TB', 1, 27990000, 27990000, 52, 0),
(54, 95, 'laptop-hp-omen-16-xf0070ax-r9-7940hs', 'Laptop HP OMEN 16 xf0070AX R9 7940HS', 'Đen', '1TB', 5, 55490000, 277450000, 53, 0),
(55, 88, 'laptop-dell-inspiron-15-3520', 'Laptop Dell Inspiron 15 3520', 'Màu bạc', '512 GB', 1, 17490000, 17490000, 54, 0),
(56, NULL, 'sanpham', 'sanpham', 'do', '11', 5, 11, 55, 55, 0),
(57, 68, 'samsung-galaxy-z-flip6-5g', 'Samsung Galaxy Z Flip6 5G', 'Màu Grey', '512 GB', 14, 24969000, 349566000, 56, 1);

--
-- Bẫy `order_items`
--
DELIMITER $$
CREATE TRIGGER `Order_item_Total_price` BEFORE INSERT ON `order_items` FOR EACH ROW SET NEW.Total_price = NEW.Price * NEW.Quantity
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stock_after_order_insert` AFTER INSERT ON `order_items` FOR EACH ROW BEGIN
    -- Cập nhật lại số lượng tồn kho của sản phẩm sau khi thêm vào bảng order_items
    UPDATE product_variants
    SET stock = stock - NEW.quantity
    WHERE id = NEW.product_variant_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Chờ xác nhận'),
(6, 'Giao hàng thành công '),
(3, 'Người bán đang chuẩn bị hàng'),
(2, 'Đặt hàng thành công '),
(7, 'Đơn hàng đã bị hủy\n'),
(4, 'Đơn hàng đã giao cho đơn vị vận chuyển '),
(9, 'Đơn hàng đã được ẩn'),
(8, 'Đơn hàng đã được hoàn tiền\r\n'),
(5, 'Đơn hàng đang giao ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `name_method` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name_method`) VALUES
(1, 'COD'),
(2, 'banking');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` char(255) NOT NULL,
  `description` text DEFAULT NULL,
  `rating` decimal(2,1) NOT NULL DEFAULT 0.0,
  `brand_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `views` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `rating`, `brand_id`, `status`, `views`, `likes`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 15 Plus', 'iphone-15-plus', 'Điện thoại thông minh cao cấp của Apple.', 1.0, 1, 1, 35, 5, '2024-11-30 04:36:04', '2025-01-17 15:59:18'),
(5, 'Samsung Galaxy A16', 'samsung-galaxy-a16', 'Điện thoại Android cao cấp của Samsung.', 0.0, 2, 1, 41, 1, '2024-11-30 04:36:04', '2025-01-16 03:47:46'),
(42, 'iphone 15 Promax', 'iphone-15-promax', 'Điện thoại thiết kế sang trọng đầy quyền lực', 0.0, 1, 1, 5, 0, '2025-01-11 01:43:34', '2025-01-14 18:05:23'),
(43, 'iphone 15', 'iphone-15', 'Với thiết kế sang trong lịch lãm. Apple cho ra mắt một sản phẩm đứng đầu thị trường', 0.0, 1, 1, 5, 0, '2025-01-11 01:49:35', '2025-01-19 14:26:11'),
(44, 'Samsung Galaxy S24 Ultra', 'samsung-galaxy-s24-ultra', 'Với thiết kế mỏng nhẹ và dung lượng pin vượt trội không kém vẻ sang trọng.', 0.0, 2, 1, 2, 0, '2025-01-11 01:55:05', '2025-01-12 03:39:35'),
(45, 'Samsung Galaxy Z Flip6 5G', 'samsung-galaxy-z-flip6-5g', 'Với thiết kế mỏng nhẹ và dung lượng pin vượt trội không kém vẻ sang trọng.', 4.0, 2, 1, 11, 0, '2025-01-11 02:02:37', '2025-01-19 15:09:57'),
(46, 'Xiaomi Redmi Note 14 Pro', 'xiaomi-redmi-note-14-pro', 'Redmi Note 14 Pro, một sản phẩm kế thừa những ưu điểm của Redmi Note 13 Pro và sở hữu các thông số nổi bật như camera 200 MP, dung lượng pin 5500 mAh cùng tần số quét 120 Hz và lớp kính mang đến độ bền cao, góp phần nâng cao hơn chất lượng sử dụng thiết bị.', 0.0, 3, 1, 3, 0, '2025-01-11 02:09:33', '2025-01-17 13:38:20'),
(47, 'Xiaomi 14T Pro 5G', 'xiaomi-14t-pro-5g', 'Hỗ trợ đầy đủ những tính năng mạnh mẽ không thua nhưng chiếc điện thoại cùng phân khúc trong thị trường', 3.0, 3, 1, 5, 0, '2025-01-11 02:15:54', '2025-01-19 14:24:41'),
(48, 'Realme 13 5G', 'realme-13-5g', 'Sản phẩm đầy đủ cam kết chất lượng với sự nâng cấp màn hình cũng như chip đầy mạnh mẽ', 0.0, 18, 1, 1, 0, '2025-01-11 02:21:41', '2025-01-17 13:38:55'),
(49, 'Realme 12', 'realme-12', 'Sản phẩm đầy đủ cam kết chất lượng với sự nâng cấp màn hình cũng như chip đầy mạnh mẽ', 0.0, 18, 1, 0, 0, '2025-01-11 02:25:53', '2025-01-11 09:25:59'),
(50, 'Laptop Asus vivobook 15 oled A1505ZA', 'laptop-asus-vivobook-15-oled-a1505za', 'Phù hợp từ học sinh, sinh viên cho đến đã đi làm. Chiếc laptop cân tất mọi tác vụ', 0.0, 6, 1, 2, 0, '2025-01-11 02:33:14', '2025-01-13 12:40:26'),
(51, 'Laptop Asus TUF Gamming F15 FX507ZC4', 'laptop-asus-tuf-gamming-f15-fx507zc4', 'Làm việc cực chất chiến game cực đã', 0.0, 6, 1, 0, 0, '2025-01-11 02:38:12', '2025-01-11 10:02:01'),
(52, 'Laptop Asus Zenbook 14 OLED UX3405MA Ultra 7', 'laptop-asus-zenbook-14-oled-ux3405ma-ultra-7', 'Chinh phục mọi tác vụ với chip thế hệ mới. Biểu tượng của sự tinh tế, đẳng cấp', 0.0, 6, 1, 1, 0, '2025-01-11 02:44:05', '2025-01-14 13:47:41'),
(53, 'Laptop Lenovo Gaming LOQ 15IAX9', 'laptop-lenovo-gaming-loq-15iax9', 'Bùng nổ sức mạnh hiệu năng. Phong thái mạnh mẽ, thời thượng', 0.0, 21, 1, 0, 0, '2025-01-11 02:48:02', '2025-01-11 10:02:17'),
(54, 'Laptop Lenovo IdeaPad Slim 5 14IMH9 Ultra 7', 'laptop-lenovo-ideapad-slim-5-14imh9-ultra-7', 'Thiết kế thanh lịch, hiện đại. Sức mạnh từ CPU Intel thế hệ mới. Màn hình OLED 14 inch sắc nét', 0.0, 21, 1, 0, 0, '2025-01-11 02:53:28', '2025-01-11 10:02:55'),
(55, 'Laptop MSI Gaming Katana 15 B13VFK', 'laptop-msi-gaming-katana-15-b13vfk', 'Thống trị thế giới ảo và công nghệ tản nhiệt hiện đại', 0.0, 19, 1, 2, 0, '2025-01-11 02:57:49', '2025-01-19 14:22:35'),
(56, 'Laptop Dell Inspiron 15 3520', 'laptop-dell-inspiron-15-3520', 'Ngoại hình tối giản, thanh lịch. Hiệu năng mạnh mẽ', 0.0, 4, 1, 1, 0, '2025-01-11 03:00:57', '2025-01-17 14:36:25'),
(57, 'Laptop Apple MacBook Air 13 inch M3', 'laptop-apple-macbook-air-13-inch-m3', 'Mỏng nhẹ là ưu điểm của chiếc macbook M3 này nhưng nó có thể cân hết mọi tác vụ trong quá trình làm việc', 0.0, 5, 1, 1, 0, '2025-01-11 03:08:17', '2025-01-17 15:59:55'),
(58, 'Laptop MacBook Pro 14 inch M4 Pro', 'laptop-macbook-pro-14-inch-m4-pro', 'Với một thương hiệu hàng đầu Macbook Pro 14 lại nổi bật vượt trội để được sự quan tâm với cộng đồng lớn không tưởng', 5.0, 5, 1, 5, 0, '2025-01-11 03:18:22', '2025-01-17 14:39:20'),
(59, 'Laptop HP 15 fd0234TU i5 1334U', 'laptop-hp-15-fd0234tu-i5-1334u', 'Thiết kế hiện đại, thanh lịch. Ổn định mọi tác vụ văn phòng', 0.0, 20, 1, 2, 0, '2025-01-11 03:21:43', '2025-01-14 16:31:45'),
(60, 'Laptop ASUS Vivobook 14 OLED A1405ZA KM264W', 'laptop-asus-vivobook-14-oled-a1405za-km264w', 'ASUS Vivobook 14 OLED A1405ZA KM264W mang lại trải nghiệm hình ảnh tốt hơn với trang bị màn hình OLED.', 0.0, 6, 1, 0, 0, '2025-01-17 05:03:15', '2025-01-17 12:30:17'),
(61, 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U', 'laptop-asus-vivobook-go-15-e1504fa-r5-7520u', 'Thiêt kế sang trọng, đơn giản, đáp ứng tốt các tác vụ văn phòng.', 0.0, 6, 1, 0, 0, '2025-01-17 05:27:41', '2025-01-17 12:30:15'),
(62, 'Laptop Dell XPS 13 9340 Ultra 7 155H', 'laptop-dell-xps-13-9340-ultra-7-155h', 'Hàng chính hãng của ASUS', 0.0, 6, 1, 4, 0, '2025-01-17 05:36:35', '2025-01-17 14:30:44'),
(63, 'Laptop HP OMEN 16 xf0070AX R9 7940HS', 'laptop-hp-omen-16-xf0070ax-r9-7940hs', 'Laptop chính hãng đến từ nhà HP, mạnh mẽ đáp ứng cho các tác vụ yêu cầu cấu hình mạnh.', 0.0, 20, 1, 4, 0, '2025-01-17 05:42:15', '2025-01-17 15:59:26'),
(64, 'Laptop HP Spectre X360 14 eu0050TU Ultra 7 155H', 'laptop-hp-spectre-x360-14-eu0050tu-ultra-7-155h', 'Sức mạnh từ CPU Intel AI, Sắc xanh lạ mắt, sang trọng, màng hình cảm ứng OLED rực rỡ, gập 360', 0.0, 20, 1, 4, 0, '2025-01-17 05:47:34', '2025-01-17 15:59:52'),
(65, 'Redmi Note 14', 'redmi-note-14', 'Redmi Note 14 Series Khoảnh khắc độc bản, tạo tác AI.', 0.0, 3, 1, 1, 0, '2025-01-17 05:57:06', '2025-01-17 13:39:19'),
(66, 'Điện thoại Samsung Galaxy S24 Ultra 5G', 'dien-thoai-samsung-galaxy-s24-ultra-5g', 'Camera 200MP, 120Hz, Dynamic AMOLED 2X 6.8\"', 0.0, 2, 1, 3, 0, '2025-01-17 06:12:39', '2025-01-17 15:42:20'),
(67, 'Redmi Note 14 Pro 5G', 'redmi-note-14-pro-5g', 'Redmi Note 14 Pro 5G thành sự lựa chọn đáng cân nhắc người dùng yêu thích smartphone bền bỉ, hiệu năng mạnh mẽ và giá cả hợp lý.', 0.0, 3, 1, 1, 0, '2025-01-17 06:19:25', '2025-01-19 15:06:23'),
(68, 'Redmi Note 14 Pro', 'redmi-note-14-pro', 'Redmi Note 14 Pro thành sự lựa chọn đáng cân nhắc người dùng yêu thích smartphone bền bỉ, hiệu năng mạnh mẽ và giá cả hợp lý.', 0.0, 3, 1, 10, 0, '2025-01-17 06:22:19', '2025-01-19 15:06:17'),
(69, 'Điện thoại realme 13+ 5G', 'dien-thoai-realme-13-5g', 'Sức mạnh vượt trội, sẳn sàng thách thức.', 0.0, 18, 1, 3, 0, '2025-01-17 06:32:16', '2025-01-17 15:43:00');

--
-- Bẫy `products`
--
DELIMITER $$
CREATE TRIGGER `Products_Updated_At` BEFORE UPDATE ON `products` FOR EACH ROW SET NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` int(11) NOT NULL,
  `category_specification_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_specifications`
--

INSERT INTO `product_specifications` (`id`, `category_specification_id`, `product_id`, `value`) VALUES
(21, 1, 1, '6.7 inches'),
(22, 3, 1, 'Super Retina XDR OLED'),
(23, 4, 1, '2796 x 1290-pixel'),
(24, 7, 1, 'Apple A17 Pro 6 nhân'),
(25, 8, 1, '8 GB'),
(26, 9, 1, 'Camera chính: 48MP, 24 mm, ƒ/1.78Camera góc siêu rộng: 12 MP, 13 mm, ƒ/2.2Camera Tele: 12 MPCamara trước: 12MP, ƒ/1.9'),
(27, 10, 1, 'IOS 17'),
(28, 24, 1, 'Dài 160.9 mm - Ngang 77.8 mm - Dày 7.8 mm - Nặng 201 g'),
(29, 14, 1, '1/2025'),
(30, 1, 5, '6.1\" - Tần số quét 120 Hz'),
(31, 3, 5, 'Dynamic AMOLED 2X'),
(32, 4, 5, 'Full HD+ (1080 x 2340 Pixels)'),
(33, 7, 5, 'Snapdragon 8 Gen 2 for Galaxy'),
(34, 8, 5, '8 GB'),
(35, 9, 5, 'Chính 50 MP & Phụ 12 MP, 10 MP'),
(36, 10, 5, 'Android 13'),
(37, 24, 5, 'Dài 146.3 mm - Ngang 70.9 mm - Dày 7.6 mm - Nặng 168 g'),
(38, 14, 5, '1/2025'),
(39, 1, 42, '6.7 inches'),
(40, 3, 42, 'Super Retina XDR OLED'),
(41, 4, 42, '4K'),
(42, 7, 42, 'Apple A17 Pro 6 nhân'),
(43, 8, 42, '8 GB'),
(44, 9, 42, 'Camera chính: 48MP, 24 mm, ƒ/1.78Camera góc siêu rộng: 12 MP, 13 mm, ƒ/2.2Camera Tele: 12 MPCamara trước: 12MP, ƒ/1.9'),
(45, 10, 42, 'IOS 17'),
(46, 24, 42, 'Dài 160.9 mm - Ngang 77.8 mm - Dày 7.8 mm - Nặng 201 g'),
(47, 14, 42, '1/2025'),
(48, 1, 43, '6.1 inches'),
(49, 3, 43, 'OLED'),
(50, 4, 43, 'Super Retina XDR (1179 x 2556 Pixels)'),
(51, 7, 43, 'Apple A16 Bionic'),
(52, 8, 43, '6 GB'),
(53, 9, 43, 'Chính 48 MP & Phụ 12 MP'),
(54, 10, 43, 'IOS 17'),
(55, 24, 43, 'Dài 147.6 mm - Ngang 71.6 mm - Dày 7.8 mm - Nặng 171 g'),
(56, 14, 43, '9/2023'),
(75, 1, 44, '6.8 inches'),
(76, 3, 44, 'Dynamic AMOLED 2X'),
(77, 4, 44, '2K + (1440 x 3120 Pixels)'),
(78, 7, 44, 'Snapdragon 8 Gen 3 for Galaxy'),
(79, 8, 44, '12 GB'),
(80, 9, 44, 'Chính 200 MP & Phụ 50 MP, 12 MP, 10 MP'),
(81, 10, 44, 'Android 14'),
(82, 24, 44, 'Dài 162.3 mm - Ngang 79 mm - Dày 8.6 mm - Nặng 232 g'),
(83, 14, 44, '1/2024'),
(84, 1, 45, '6.7 inches'),
(85, 3, 45, 'Dynamic AMOLED 2X'),
(86, 4, 45, 'FHD+ (1080 x 2640 Pixels) x Phụ: HD+ (720 x 748 Pixels)'),
(87, 7, 45, 'Snapdragon 8 Gen 3 for Galaxy'),
(88, 8, 45, '12 GB'),
(89, 9, 45, '48MP, 24 mm, ƒ/1.78Camera góc siêu rộng: 12 MP, 13 mm, ƒ/2.2Camera Tele: 12 MPCamara trước: 12MP, ƒ/1.9'),
(90, 10, 45, 'Android 14'),
(91, 24, 45, 'Dài 165.1 mm (khi mở) | 85.1 mm (khi gập) - Ngang 71.9 mm - Dày 6.9 mm (khi mở) | 14.9 mm (ghi gập) - Nặng 187 g'),
(92, 14, 45, '7/2024'),
(93, 1, 46, '6.67 inches'),
(94, 3, 46, 'AMOLED'),
(95, 4, 46, '1.5K (1220 x 2712 Pixels)'),
(96, 7, 46, 'Snapdragon 8 Gen 3 for Galaxy'),
(97, 8, 46, '8 GB'),
(98, 9, 46, 'Chính 200 MP & Phụ 8 MP, 2 MP'),
(99, 10, 46, 'Android 14'),
(100, 24, 46, 'Dài 162.53 mm - Ngang 74.67 mm - Dày 8.75 mm'),
(101, 14, 46, '1/2025'),
(102, 1, 47, '6.67 inches 144Hz'),
(103, 3, 47, 'AMOLED'),
(104, 4, 47, '1.5K (1220 x 2712 Pixels)'),
(105, 7, 47, 'MediaTek Dimensity 9300+ 8 nhân'),
(106, 8, 47, '12 GB'),
(107, 9, 47, 'Chính 50 MP & Phụ 50 MP, 12 MP'),
(108, 10, 47, 'Xiaomi HyperOS (Android 14)'),
(109, 24, 47, 'Dài 160.4 mm - Ngang 75.1 mm - Dày 8.39 mm - Nặng 209 g'),
(110, 14, 47, '9/2024'),
(111, 1, 48, '6.67 inches 144Hz'),
(112, 3, 48, 'AMOLED'),
(113, 4, 48, '1.5K (1220 x 2712 Pixels)'),
(114, 7, 48, 'MediaTek Dimensity 9300+ 8 nhân'),
(115, 8, 48, '12 GB'),
(116, 9, 48, 'Chính 50 MP & Phụ 50 MP, 12 MP'),
(117, 10, 48, 'Xiaomi HyperOS (Android 14)'),
(118, 24, 48, 'Dài 160.4 mm - Ngang 75.1 mm - Dày 8.39 mm - Nặng 209 g'),
(119, 14, 48, '9/2024'),
(120, 1, 49, '6.67\" - Tần số quét 120 Hz'),
(121, 3, 49, 'AMOLED'),
(122, 4, 49, 'Full HD + (1080 x 2400 Pixels)'),
(123, 7, 49, 'Snapdragon 685 8 nhân'),
(124, 8, 49, '8 GB'),
(125, 9, 49, 'Chính 50 MP & Phụ 2 MP'),
(126, 10, 49, 'Android 14'),
(127, 24, 49, 'Dài 162.95 mm - Ngang 75.45 mm - Dày 7.92 mm - Nặng 187 g'),
(128, 14, 49, '2024-08-16'),
(129, 1, 50, '15.6 inches'),
(130, 3, 50, 'OLED'),
(131, 4, 50, '2.8K (2880 x 1620) - OLED'),
(132, 7, 50, 'Intel Core i5 Alder Lake - 12500H'),
(133, 8, 50, '16 GB'),
(134, 9, 50, 'HD Webcam'),
(135, 10, 50, 'Windows 11 Home SL'),
(136, 24, 50, 'Dài 356.8 mm - Rộng 227.6 mm - Dày 19.9 mm - 1.7 kg'),
(137, 14, 50, '2024-04-04'),
(138, 1, 51, '15.6 inches'),
(139, 3, 51, 'Tấm nền IPS'),
(140, 4, 51, 'Full HD + (1920 x 1080)'),
(141, 7, 51, 'Intel Core i7 Alder Lake - 12700H'),
(142, 8, 51, '16 GB'),
(143, 9, 51, 'HD Webcam'),
(144, 10, 51, 'Windows 11 Home SL'),
(145, 24, 51, 'Dài 354 mm - Rộng 251 mm - Dày 24.9 mm - 2.2 kg'),
(146, 14, 51, '2023-09-17'),
(147, 1, 52, '14 inches'),
(148, 3, 52, 'OLED'),
(149, 4, 52, '2.8K (2880 x 1800) - OLED 16:10'),
(150, 7, 52, 'Intel CorUltra 7 Meteor Lake - 155H'),
(151, 8, 52, '32 GB'),
(152, 9, 52, 'Full HD Webcam'),
(153, 10, 52, 'Windows 11 Home SL'),
(154, 24, 52, 'Dài 312.4 mm - Rộng 220.1 mm - Dày 14.9 mm - 1.2 kg'),
(155, 14, 52, '2023-12-01'),
(156, 1, 53, '15.6 inches'),
(157, 3, 53, 'Low Blue Light Tấm nền IPS'),
(158, 4, 53, 'Full HD (1920 x 1080)'),
(159, 7, 53, 'Intel Core i5 Alder Lake - 12450HX'),
(160, 8, 53, '24 GB'),
(161, 9, 53, 'HD Webcam'),
(162, 10, 53, 'Windows 11 Home SL'),
(163, 24, 53, 'Dài 359.86 mm - Rộng 258.7 mm - Dày 23.9 mm - 2.38 kg'),
(164, 14, 53, '2024-09-09'),
(165, 1, 54, '14 inches'),
(166, 3, 54, 'OLED'),
(167, 4, 54, 'WUXGA, OLED'),
(168, 7, 54, 'Intel Core Ultra 7 Meteor Lake - 155H'),
(169, 8, 54, '32 GB'),
(170, 9, 54, 'Full HD Webcam'),
(171, 10, 54, 'Windows 11 Home SL'),
(172, 24, 54, 'Dài 312 mm - Rộng 221 mm - Dày 16.9 mm - 1.48 kg'),
(173, 14, 54, '2024-07-07'),
(174, 1, 55, '15.6 inches'),
(175, 3, 55, 'Tấm nền IPS'),
(176, 4, 55, 'Full HD + (1920 x 1080)'),
(177, 7, 55, 'Intel Core i7 Raptor Lake - 13620H'),
(178, 8, 55, '16 GB'),
(179, 9, 55, 'HD Webcam'),
(180, 10, 55, 'Windows 11 Home SL'),
(181, 24, 55, 'Dài 359 mm - Rộng 259 mm - Dày 24.9 mm - 2.25 kg'),
(182, 14, 55, '2023-05-19'),
(183, 1, 56, '15.6 inches'),
(184, 3, 56, 'Chống chói Anti Glare LED Backlit'),
(185, 4, 56, 'Full HD + (1920 x 1080)'),
(186, 7, 56, 'Intel Core i5 Alder Lake - 1235U'),
(187, 8, 56, '16 GB'),
(188, 9, 56, 'HD Webcam'),
(189, 10, 56, 'Windows 11 Home SL'),
(190, 24, 56, 'Dài 358.5 mm - Rộng 235.56 mm - Dày 16.96 mm - 1.66 kg'),
(191, 14, 56, '2023-07-20'),
(192, 1, 57, '13.6 inches'),
(193, 3, 57, 'Liquid Retina (2560 x 1664)'),
(194, 4, 57, 'Wide color (P3) 500 nits brightness'),
(195, 7, 57, 'Apple M3 - Hãng không công bố'),
(196, 8, 57, '16 GB'),
(197, 9, 57, 'Full HD Webcam'),
(198, 10, 57, 'macOS Sonoma'),
(199, 24, 57, 'Dài 304.1 mm - Rộng 215 mm - Dày 11.3 mm - 1.24 kg'),
(200, 14, 57, '2024-09-29'),
(201, 1, 58, '14.2 inches'),
(202, 3, 58, 'ProMotion Wide color (P3) True Tone Technology 1 tỷ màu'),
(203, 4, 58, 'Liquid Retina XDR display (3024 x 1964)'),
(204, 7, 58, 'Apple M4 Pro - Hãng không công bố'),
(205, 8, 58, '48 GB'),
(206, 9, 58, '1080p FaceTime HD camera'),
(207, 10, 58, 'macOS Sequoia'),
(208, 24, 58, 'Dài 312.6 mm - Rộng 221.2 mm - Dày 15.5 mm - 1.6 kg'),
(209, 14, 58, '2024-10-16'),
(210, 1, 59, '15.6 inches'),
(211, 3, 59, 'Chống chói Anti Glare 250 nits'),
(212, 4, 59, 'Full HD + (1920 x 1080)'),
(213, 7, 59, 'Intel Core i5 Raptor Lake - 1334U'),
(214, 8, 59, '16 GB'),
(215, 9, 59, 'HD Webcam'),
(216, 10, 59, 'Windows 11 Home SL'),
(217, 24, 59, 'Dài 359.8 mm - Rộng 236 mm - Dày 18.6 mm - 1.59 kg'),
(218, 14, 59, '2023-09-17'),
(219, 17, 60, 'Kích thước 14 inch'),
(220, 18, 60, '100% DCI-P3, Glossy display, Screen-to-body ratio: 86%, PANTONE Validated, VESA CERTIFIED Display HDR True Black 600'),
(221, 19, 60, '4\" 2.8K (2880 x 1800) OLED 16:10, 90Hz 0.2ms, 600nits'),
(222, 20, 60, 'Intel® Core™ i5-12500H Processor 2.5 GHz (18M Cache, up to 4.5 GHz, 4P+8E cores)'),
(223, 21, 60, '8GB on-board + 8GB SO-DIMM (DDR4)'),
(224, 22, 60, '720p HD camera With privacy shutter'),
(225, 23, 60, 'Windows 11 Home'),
(226, 24, 60, '31.71 x 22.20 x 1.99 cm'),
(227, 25, 60, '2022'),
(229, 17, 62, '13.4\"'),
(230, 18, 62, 'Anti-Reflective Eyesafe 500 nits brightness, Cảm ứng'),
(231, 19, 62, 'QHD+ (2560 x 1600) 60Hz'),
(232, 20, 62, 'Intel Core Ultra 7 Meteor Lake - 155H'),
(233, 21, 62, '16GB'),
(234, 22, 62, 'HD webcam Camera IR'),
(235, 23, 62, 'Windows 11 Home SL + Office Home & Student 2021 vĩnh viễn'),
(236, 24, 62, 'Dài 295.3 mm - Rộng 199 mm - Dày 15.3 mm - 1.17 kg'),
(237, 25, 62, '2024'),
(238, 17, 63, '16.1\"'),
(239, 18, 63, 'Low Blue Light Thời gian phản hồi: 3 ms Tấm nền IPS Chống chói Anti Glare Độ sáng 300 nits'),
(240, 19, 63, 'QHD 240Hz 100%'),
(241, 20, 63, 'AMD Ryzen 9 - 7940HS'),
(242, 21, 63, '32GB'),
(243, 22, 63, 'Full HD Webcam'),
(244, 23, 63, 'Windows 11 Home SL'),
(245, 24, 63, 'Dài 369 mm - Rộng 259.4 mm - Dày 23.5 mm - 2.37 kg'),
(246, 25, 63, '2024'),
(247, 17, 64, '14\"'),
(248, 18, 64, 'hời gian phản hồi 0.2 ms Low Blue Light Màn hình OLED 400 nits 500 nits (Khi bật HDR) 1.07 tỷ màu'),
(249, 19, 64, '2.8K (2880 x 1800) - OLED, 120HZ, 100% DCI-P3'),
(250, 20, 64, 'Intel Core Ultra 7 Meteor Lake - 155H'),
(251, 21, 64, '32 GB'),
(252, 22, 64, 'HP Wide Vision 9 MP Camera IR'),
(253, 23, 64, 'Windows 11 Home SL'),
(254, 24, 64, 'Dài 313.7 mm - Rộng 220.4 mm - Dày 16.9 mm - 1.44 kg'),
(255, 25, 64, '2024'),
(256, 1, 65, 'AMOLED 6.67\" Full HD+'),
(257, 3, 65, 'AMOLED'),
(258, 4, 65, 'Full HD+ (1080 x 2400 Pixels)'),
(259, 7, 65, 'MediaTek Helio G99-Ultra 8 nhân'),
(260, 8, 65, '6GB'),
(261, 9, 65, 'Độ phân giải camera sau	Chính 108 MP & Phụ 2 MP, 2 MP Quay phim camera sau	 HD 720p@30fps  FullHD 1080p@60fps  FullHD 1080p@30fps'),
(262, 10, 65, 'Xiaomi HyperOS (Android 14)'),
(263, 12, 65, 'Dài 163.25 mm - Ngang 76.55 mm - Dày 8.16 mm - Nặng 196.5 g'),
(264, 14, 65, '01/2025'),
(265, 1, 66, '6.8\" - Tần số quét 120 Hz'),
(266, 3, 66, 'Dynamic AMOLED 2X'),
(267, 4, 66, '2K+ (1440 x 3120 Pixels), 2600 nits'),
(268, 7, 66, 'Snapdragon 8 Gen 3 for Galaxy'),
(269, 8, 66, '12 GB'),
(270, 9, 66, 'Chính 200 MP & Phụ 50 MP, 12 MP, 10 MP'),
(271, 10, 66, 'Android 14'),
(272, 12, 66, 'Dài 162.3 mm - Ngang 79 mm - Dày 8.6 mm - Nặng 232 g'),
(273, 14, 66, '01/2024'),
(274, 1, 67, 'AMOLED 6.67\" 1.5K'),
(275, 3, 67, 'AMOLED'),
(276, 4, 67, '1.5K (1220 x 2712 Pixels), 3000 nits'),
(277, 7, 67, 'Snapdragon 7s Gen 3 5G 8 nhân'),
(278, 8, 67, '8 GB'),
(279, 9, 67, 'Chính 200 MP & Phụ 8 MP, 2 MP'),
(280, 10, 67, 'Android 14'),
(281, 12, 67, 'Dài 162.53 mm - Ngang 74.67 mm - Dày 8.75 mm (Đen, Xanh) | 8.85 mm (Tím) - Nặng 210.14g (Đen, Xanh) | 205.13g (Tím)'),
(282, 14, 67, '01/2025'),
(283, 1, 68, 'AMOLED 6.67\" 1.5K'),
(284, 3, 68, 'AMOLED'),
(285, 4, 68, '1.5K (1220 x 2712 Pixels), 3000 nits'),
(286, 7, 68, 'Snapdragon 7s Gen 3 5G 8 nhân'),
(287, 8, 68, '8 GB'),
(288, 9, 68, 'Chính 200 MP & Phụ 8 MP, 2 MP'),
(289, 10, 68, 'Android 14'),
(290, 12, 68, 'Dài 162.53 mm - Ngang 74.67 mm - Dày 8.75 mm (Đen, Xanh) | 8.85 mm (Tím) - Nặng 210.14g (Đen, Xanh) | 205.13g (Tím)'),
(291, 14, 68, '01/2025'),
(292, 1, 69, '6.67\" - Tần số quét 120 Hz'),
(293, 3, 69, 'OLED'),
(294, 4, 69, 'Full HD+ (1080 x 2400 Pixels), 2000 nits'),
(295, 7, 69, 'MediaTek Dimensity 7300 Energy 5G 8 nhân'),
(296, 8, 69, '12 GB'),
(297, 9, 69, 'Chính 50 MP & Phụ 2 MP, Flicker'),
(298, 10, 69, 'Android 14'),
(299, 12, 69, 'Dài 161.7 mm - Ngang 74.7 mm - Dày 7.6 mm - Nặng 185 g'),
(300, 14, 69, '01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `color` varchar(30) NOT NULL,
  `internal_memory` varchar(30) NOT NULL,
  `image` char(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variants`
--

INSERT INTO `product_variants` (`id`, `color`, `internal_memory`, `image`, `price`, `stock`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Màu xanh', '128GB', 'product_variant_1736047397.png', 22690000, 78, 1, 1, '2024-11-30 04:36:16', '2025-01-15 07:31:54'),
(2, 'Màu trắng', '256GB', 'product_variant_1736047403.png', 22000000, 49, 1, 1, '2024-11-30 04:36:16', '2025-01-11 08:22:49'),
(9, 'Màu xanh', '128GB', 'samsung_galaxy_s23_blue.png', 5969000, 108, 5, 1, '2024-11-30 04:36:16', '2025-01-11 08:34:58'),
(10, 'Màu đen', '256GB', 'samsung_galaxy_s23_black.png', 6690000, 90, 5, 1, '2024-11-30 04:36:16', '2025-01-11 08:35:06'),
(64, 'Màu Grey', '256 GB', 'product_variant_11737297326.png', 26690000, 4, 42, 1, '2025-01-11 01:43:34', '2025-01-19 14:35:26'),
(65, 'Màu Titan', '512 GB', 'product_variant_11737297334.png', 34990000, 7, 42, 1, '2025-01-11 01:43:34', '2025-01-19 14:35:34'),
(66, 'Màu hồng', '128 GB', 'product_variant_11737297176.png', 18990000, 8, 43, 1, '2025-01-11 01:49:35', '2025-01-19 14:32:56'),
(67, 'Titanium', '256 GB', 'product_variant_1736585705.jpg', 24969000, 25, 44, 1, '2025-01-11 01:55:05', '2025-01-11 08:55:29'),
(68, 'Màu Grey', '512 GB', 'product_variant_1736586157.jpg', 24969000, 0, 45, 1, '2025-01-11 02:02:37', '2025-01-19 15:07:42'),
(69, 'Màu tím', '256 GB', 'product_variant_1736586573.jpg', 7796000, 6, 46, 1, '2025-01-11 02:09:33', '2025-01-11 09:16:01'),
(70, 'Màu xanh', '512 GB', 'product_variant_1736586573.jpg', 9690000, 7, 46, 1, '2025-01-11 02:09:33', '2025-01-11 09:16:01'),
(71, 'Màu blue', '256 GB', 'product_variant_1736586954.jpg', 15290000, 3, 47, 1, '2025-01-11 02:15:54', '2025-01-16 03:58:01'),
(72, 'Màu black', '512 GB', 'product_variant_1736586954.jpg', 16190000, 5, 47, 1, '2025-01-11 02:15:54', '2025-01-17 14:33:24'),
(73, 'Màu vàng kim', '512 GB', 'product_variant_1736587301.jpg', 9990000, 8, 48, 1, '2025-01-11 02:21:41', '2025-01-11 09:25:58'),
(74, 'Màu tím', '256GB', 'product_variant_1736587301.jpg', 8290000, 12, 48, 1, '2025-01-11 02:21:41', '2025-01-11 09:25:58'),
(75, 'Màu blue', '512 GB', 'product_variant_1736587553.jpg', 8990000, 6, 49, 1, '2025-01-11 02:25:53', '2025-01-11 09:25:59'),
(76, 'Màu green', '256 GB', 'product_variant_1736587553.jpg', 7990000, 8, 49, 1, '2025-01-11 02:25:53', '2025-01-11 09:25:59'),
(77, 'Màu bạc', '256 GB', 'product_variant_1736587994.jpg', 15990000, 21, 50, 1, '2025-01-11 02:33:14', '2025-01-11 09:33:23'),
(78, 'Màu đen', '512 GB', 'product_variant_1736587994.jpg', 17696000, 12, 50, 1, '2025-01-11 02:33:14', '2025-01-11 09:33:23'),
(79, 'Màu bạc', '256 GB', 'product_variant_1736588292.jpg', 20490000, 30, 51, 1, '2025-01-11 02:38:12', '2025-01-11 09:48:06'),
(80, 'Màu bạc', '512 GB', 'product_variant_1736588292.jpg', 21690000, 32, 51, 1, '2025-01-11 02:38:12', '2025-01-11 09:48:06'),
(81, 'Màu Blue', '1 TB', 'product_variant_1736588645.jpg', 31990000, 9, 52, 1, '2025-01-11 02:44:05', '2025-01-11 09:48:08'),
(82, 'Màu bạc đen', '256 GB', 'product_variant_1736588882.jpg', 22490000, 7, 53, 1, '2025-01-11 02:48:02', '2025-01-11 09:48:09'),
(83, 'Màu bạc', '512 GB', 'product_variant_1736588882.jpg', 24490000, 6, 53, 1, '2025-01-11 02:48:02', '2025-01-11 09:48:09'),
(84, 'Màu bạc', '512 GB', 'product_variant_1736589208.jpg', 25490000, 15, 54, 1, '2025-01-11 02:53:28', '2025-01-11 10:01:02'),
(85, 'Màu bạc', '1 TB', 'product_variant_1736589208.jpg', 27696000, 17, 54, 1, '2025-01-11 02:53:28', '2025-01-11 10:01:02'),
(86, 'Màu đen', '512 GB', 'product_variant_1736589469.jpg', 25990000, 15, 55, 1, '2025-01-11 02:57:49', '2025-01-11 10:01:04'),
(87, 'Màu đen', '1 TB', 'product_variant_1736589469.jpg', 27990000, 15, 55, 1, '2025-01-11 02:57:49', '2025-01-17 14:34:59'),
(88, 'Màu bạc', '512 GB', 'product_variant_1736589657.jpg', 17490000, 17, 56, 1, '2025-01-11 03:00:57', '2025-01-17 14:37:00'),
(89, 'Màu Grey', '512 GB', 'product_variant_1736590097.jpg', 31490000, 17, 57, 1, '2025-01-11 03:08:17', '2025-01-11 10:13:11'),
(90, 'Màu Grey', '1 TB', 'product_variant_1736590097.jpg', 35490000, 15, 57, 1, '2025-01-11 03:08:17', '2025-01-11 10:13:11'),
(91, 'Màu black', '512 GB', 'product_variant_1736590702.jpg', 59990000, 14, 58, 1, '2025-01-11 03:18:22', '2025-01-17 13:47:47'),
(92, 'Màu Grey', '1 TB', 'product_variant_1736590702.jpg', 61999999, 0, 58, 1, '2025-01-11 03:18:22', '2025-01-17 14:34:21'),
(93, 'Màu bạc', '512 GB', 'product_variant_1736590903.jpg', 15990000, 25, 59, 1, '2025-01-11 03:21:43', '2025-01-11 10:21:49'),
(94, 'Bạc', '512GB', 'product_variant_1737117395.jpg', 54990000, 21, 62, 1, '2025-01-17 05:36:35', '2025-01-17 14:31:22'),
(95, 'Đen', '1TB', 'product_variant_1737117735.jpg', 55490000, 15, 63, 1, '2025-01-17 05:42:15', '2025-01-17 14:36:15'),
(96, 'Xanh(Blue)', '1TB', 'product_variant_1737118054.jpg', 51790000, 22, 64, 1, '2025-01-17 05:47:34', '2025-01-17 14:23:51'),
(97, 'Đen', '128GB', 'product_variant_1737118626.png', 4790000, 24, 65, 1, '2025-01-17 05:57:06', '2025-01-17 13:40:22'),
(98, 'Hồng', '128GB', 'product_variant_1737118626.png', 4790000, 20, 65, 1, '2025-01-17 05:57:06', '2025-01-17 13:32:34'),
(99, 'Xanh lá', '128GB', 'product_variant_1737118626.png', 4790000, 20, 65, 1, '2025-01-17 05:57:06', '2025-01-17 13:32:34'),
(100, 'Xám', '256 GB', 'product_variant_1737119559.jpg', 23490000, 20, 66, 1, '2025-01-17 06:12:39', '2025-01-17 13:32:31'),
(101, 'Xám', '512GB', 'product_variant_1737119559.jpg', 26590000, 20, 66, 1, '2025-01-17 06:12:39', '2025-01-17 13:32:31'),
(102, 'Vàng', '256GB', 'product_variant_1737119559.jpg', 23490000, 20, 66, 1, '2025-01-17 06:12:39', '2025-01-17 13:32:31'),
(103, 'Vàng', '512GB', 'product_variant_1737119559.jpg', 26590000, 20, 66, 1, '2025-01-17 06:12:39', '2025-01-17 13:32:31'),
(104, 'Đen', '256GB', 'product_variant_1737119559.jpg', 23490000, 20, 66, 1, '2025-01-17 06:12:39', '2025-01-17 13:32:31'),
(105, 'Đen', '512GB', 'product_variant_1737119559.jpg', 26590000, 15, 66, 1, '2025-01-17 06:12:39', '2025-01-17 13:32:31'),
(106, 'Tím', '256GB', 'product_variant_1737119559.jpg', 23490000, 20, 66, 1, '2025-01-17 06:12:39', '2025-01-17 13:32:31'),
(107, 'Tím', '512GB', 'product_variant_1737119559.jpg', 26590000, 19, 66, 1, '2025-01-17 06:12:39', '2025-01-17 14:28:26'),
(108, 'Đen', '256 GB', 'product_variant_1737119965.png', 10790000, 20, 67, 1, '2025-01-17 06:19:25', '2025-01-17 13:32:30'),
(109, 'Xanh', '256GB', 'product_variant_1737119965.png', 10790000, 20, 67, 1, '2025-01-17 06:19:25', '2025-01-17 13:32:30'),
(110, 'Tím', '256GB', 'product_variant_1737119965.png', 10790000, 20, 67, 1, '2025-01-17 06:19:25', '2025-01-17 13:32:30'),
(111, 'Đen', '256 GB', 'product_variant_1737120139.png', 7790000, 20, 68, 1, '2025-01-17 06:22:19', '2025-01-17 13:32:29'),
(112, 'Xanh', '256GB', 'product_variant_1737120139.png', 7790000, 20, 68, 1, '2025-01-17 06:22:19', '2025-01-17 13:32:29'),
(113, 'Tím', '256GB', 'product_variant_1737120139.png', 7790000, 20, 68, 1, '2025-01-17 06:22:19', '2025-01-17 13:32:29'),
(114, 'Tím', '256 GB', 'product_variant_1737120736.jpg', 9690000, 20, 69, 1, '2025-01-17 06:32:16', '2025-01-17 13:32:25'),
(115, 'Vàng', '256', 'product_variant_1737120736.jpg', 9690000, 20, 69, 1, '2025-01-17 06:32:16', '2025-01-17 13:32:25');

--
-- Bẫy `product_variants`
--
DELIMITER $$
CREATE TRIGGER `Product_Variants_Updated_At` BEFORE UPDATE ON `product_variants` FOR EACH ROW SET NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `point` decimal(2,1) NOT NULL DEFAULT 5.0,
  `color` varchar(30) NOT NULL,
  `internal_memory` varchar(30) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `content`, `point`, `color`, `internal_memory`, `product_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'sản phẩm tuyệt vời', 5.0, 'Màu Grey', '512 GB', 45, 15, 1, '2025-01-15 20:39:31', '2025-01-15 20:39:31'),
(4, 'Sản phẩm tuyệt vời', 5.0, 'Màu Grey', '512 GB', 45, 15, 1, '2025-01-15 20:40:54', '2025-01-15 20:40:54'),
(7, 'sản phẩm oke', 4.0, 'Màu Grey', '512 GB', 45, 15, 1, '2025-01-15 21:03:35', '2025-01-15 21:03:35'),
(8, 'sản phẩm oke', 4.0, 'Màu Grey', '512 GB', 45, 15, 1, '2025-01-15 21:04:46', '2025-01-15 21:04:46'),
(9, 'sản phẩm oke', 4.0, 'Màu Grey', '512 GB', 45, 15, 1, '2025-01-15 21:04:52', '2025-01-15 21:04:52'),
(10, 'sản phẩm hơi oke', 3.0, 'Màu Grey', '512 GB', 45, 15, 1, '2025-01-15 21:05:03', '2025-01-15 21:05:03'),
(11, 'sản phẩm hơi oke', 3.0, 'Màu Grey', '512 GB', 45, 15, 1, '2025-01-15 21:05:11', '2025-01-15 21:05:11'),
(12, 'sản phẩm hơi oke', 3.0, 'Màu Grey', '512 GB', 45, 15, 1, '2025-01-15 21:06:01', '2025-01-15 21:06:01'),
(13, 'sảnsản phẩm ko oke', 2.0, 'Màu blue', '256 GB', 47, 15, 1, '2025-01-15 21:06:18', '2025-01-15 21:06:18'),
(15, 'sản phẩm ko oke', 2.0, 'Màu blue', '256 GB', 47, 15, 1, '2025-01-15 21:06:35', '2025-01-15 21:06:35'),
(16, 'sản phẩm rất tệ', 1.0, 'Màu xanh', '128GB', 1, 15, 1, '2025-01-15 21:06:47', '2025-01-15 21:06:47'),
(18, 'sản phẩm rất tệ', 1.0, 'Màu xanh', '128GB', 1, 15, 1, '2025-01-15 21:07:07', '2025-01-15 21:07:07'),
(20, 'sản phầm rất tuyệt vời', 5.0, 'Màu blue', '256 GB', 47, 15, 1, '2025-01-15 23:43:19', '2025-01-15 23:43:19'),
(21, 'sản phẩm thật toẹt zời', 5.0, 'Màu Grey', '1 TB', 58, 12, 1, '2025-01-17 07:39:18', '2025-01-17 07:39:18'),
(22, 'sản phẩm thật toẹt zời', 5.0, 'Màu black', '512 GB', 58, 12, 1, '2025-01-17 07:39:20', '2025-01-17 07:39:20'),
(23, 'sản phẩm đẹp mắt', 5.0, 'Màu Grey', '512 GB', 45, 16, 1, '2025-01-19 08:09:30', '2025-01-19 08:09:30');

--
-- Bẫy `ratings`
--
DELIMITER $$
CREATE TRIGGER `Ratings_Updated_At` BEFORE UPDATE ON `ratings` FOR EACH ROW SET NEW.updated_at = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_product_rate_after_delete` AFTER DELETE ON `ratings` FOR EACH ROW BEGIN
    -- Cập nhật lại trường `rate` trong bảng `products`
    UPDATE products
    SET rating = (SELECT AVG(point) FROM ratings WHERE product_id = OLD.product_id)
    WHERE id = OLD.product_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_product_rate_after_insert` AFTER INSERT ON `ratings` FOR EACH ROW BEGIN
    -- Cập nhật lại trường `rate` trong bảng `products`
    UPDATE products
    SET Rating = (SELECT AVG(point) FROM ratings WHERE product_id = NEW.product_id)
    WHERE id = NEW.product_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_product_rate_after_update` AFTER UPDATE ON `ratings` FOR EACH ROW BEGIN
    -- Cập nhật lại trường `rate` trong bảng `products`
    UPDATE products
    SET rating = (SELECT AVG(point) FROM ratings WHERE product_id = NEW.product_id)
    WHERE id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_chats`
--

CREATE TABLE `room_chats` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` char(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(3) NOT NULL,
  `date_of_birth` date NOT NULL,
  `image` char(255) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` char(255) NOT NULL,
  `role` char(3) NOT NULL DEFAULT 'KH',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `gender`, `date_of_birth`, `image`, `phone`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(11, 'NguyenThuyAnhThu', '$2y$12$OvcXuzJ0C9vUxV0h8WuXQ./TAiyK6zAom0a3lR9zv62kv.hk.gaji', 'Nguyễn Thùy Anh Thư', 'Nữ', '2025-01-10', '', '0123456785', 'Thu@gmail.com', 'KH', 1, '2025-01-10 14:00:34', '2025-01-11 10:25:32'),
(12, 'NguyenQuocDo', '$2y$12$Tauzu2jcOMNd5jfcRmAiD.BNs.f4rtMTDD1fjoixre0od2WcdEtty', 'Nguyễn Quốc Đô', 'Nam', '2025-01-11', '', '0362636315', 'quocdo@gmail.com', 'KH', 1, '2025-01-11 10:29:09', '2025-01-11 10:29:09'),
(13, 'DangKhanhDong', '$2y$12$ArpTp3Oigia4huwdjfTjhudCbmY9BbCskI0YEVbFeEH0nhWFrG8x2', 'Đặng Khánh Đông', 'Nam', '2025-01-11', '', '0325646495', 'khanhdong@gmail.com', 'QL', 1, '2025-01-11 10:29:57', '2025-01-12 03:20:02'),
(14, 'PhanThanhLong', '$2y$12$ETdWxIhoYDnukrqEmOAgYeUSmCpXpyj/ZApufrPhxuJ5ceicD2F1S', 'Phan Thành Long', 'Nam', '2025-01-11', '', '0823654596', 'longphan@gmail.com', 'KH', 1, '2025-01-11 10:30:50', '2025-01-11 10:30:50'),
(15, 'NguyenTruongGiang', '$2y$12$nd0/nPrxSclusX2oSNUG0ePuz7Zl5Afx5MyCmw0qF3enzHIKCm5ne', 'Nguyễn Trường Giang', 'Nam', '2025-01-11', '', '0765984134', 'truonggiang@gmail.com', 'KH', 1, '2025-01-11 10:31:53', '2025-01-11 10:31:53'),
(16, 'NguyenNgocHoang', '$2y$12$hcKz0gMCrEPYvLPxjt/CeuwNoPggy5bNFNnH5ireFvrPmwmD2cPuO', 'Nguyễn Ngọc Hoàng', 'Nam', '2025-01-11', '', '0369585731', 'hoang@gmail.com', 'KH', 1, '2025-01-11 10:32:48', '2025-01-11 10:32:48');

--
-- Bẫy `users`
--
DELIMITER $$
CREATE TRIGGER `Users_Update_at` BEFORE UPDATE ON `users` FOR EACH ROW SET NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount_value` int(11) NOT NULL,
  `min_order_value` int(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `name`, `discount_value`, `min_order_value`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'G100K', 'Giảm 100k cho đơn hàng có giá trị trên 2 triệu', 100000, 2000000, '2024-11-29', '2025-11-06', 1, '2024-11-30 01:37:39', '2025-01-16 22:56:54'),
(2, 'G200K', 'Giảm 200k cho đơn hàng có giá trị trên 4 triệu', 200000, 4000000, '2024-11-30', '2025-12-04', 1, '2024-11-30 01:40:38', '2025-01-16 22:56:47'),
(3, 'G500K', 'Giảm 500k cho đơn hàng có giá trị trên 10 triệu ', 500000, 10000000, '2024-11-30', '2025-12-10', 1, '2024-11-30 01:44:24', '2025-01-16 22:57:07'),
(4, 'G1000K', 'Giảm 1 triệu cho đơn hàng có giá trị từ 15 triệu', 1000000, 15000000, '2025-01-01', '2026-01-01', 1, '2025-01-15 10:51:16', '2025-01-15 10:51:16');

--
-- Bẫy `vouchers`
--
DELIMITER $$
CREATE TRIGGER `Voucher_Status_Insert` BEFORE INSERT ON `vouchers` FOR EACH ROW IF CURRENT_DATE BETWEEN NEW.Start_date AND NEW.End_date THEN
    SET NEW.Status = 1;
ELSE
    SET NEW.Status = 0;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Voucher_Status_Update` BEFORE UPDATE ON `vouchers` FOR EACH ROW IF CURRENT_DATE BETWEEN NEW.Start_date AND NEW.End_date THEN
    SET NEW.Status = 1;
ELSE
    SET NEW.Status = 0;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Vouchers_Update_at` BEFORE UPDATE ON `vouchers` FOR EACH ROW SET NEW.updated_at = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher_users`
--

CREATE TABLE `voucher_users` (
  `id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher_users`
--

INSERT INTO `voucher_users` (`id`, `voucher_id`, `user_id`) VALUES
(2, 4, 16);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Blogs_Unq_Slug` (`slug`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_brand` (`category_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Categories_Unq_Name` (`name`),
  ADD UNIQUE KEY `Categories_Unq_Slug` (`slug`);

--
-- Chỉ mục cho bảng `category_specifications`
--
ALTER TABLE `category_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cateogry_specification` (`category_id`);

--
-- Chỉ mục cho bảng `chat_details`
--
ALTER TABLE `chat_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chat_detail_room_chat` (`room_chat_id`),
  ADD KEY `fk_chat_detail_user` (`user_send`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image_product_product` (`product_id`);

--
-- Chỉ mục cho bảng `image_ratings`
--
ALTER TABLE `image_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image_rating_rating` (`rating_id`);

--
-- Chỉ mục cho bảng `like_products`
--
ALTER TABLE `like_products`
  ADD PRIMARY KEY (`id`,`product_id`,`user_id`),
  ADD KEY `fk_like_products_product` (`product_id`),
  ADD KEY `fk_like_products_user` (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_code` (`order_code`),
  ADD KEY `fk_order_voucher` (`voucher_id`),
  ADD KEY `fk_order_order_status` (`order_status_id`),
  ADD KEY `fk_order_user` (`user_id`),
  ADD KEY `fk_order_payment_method` (`payment_method`),
  ADD KEY `order_status_id` (`order_status_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_oder_item_order` (`order_id`),
  ADD KEY `fk_order_items_variant` (`product_variant_id`);

--
-- Chỉ mục cho bảng `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Order_Status_Unq_Name` (`name`);

--
-- Chỉ mục cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Products_Unq_Slug` (`slug`),
  ADD KEY `fk_product_brand` (`brand_id`);

--
-- Chỉ mục cho bảng `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_spe_spe` (`category_specification_id`),
  ADD KEY `fk_product_spe` (`product_id`);

--
-- Chỉ mục cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_variants_prouduct` (`product_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rating_product` (`product_id`),
  ADD KEY `fk_rating_user` (`user_id`);

--
-- Chỉ mục cho bảng `room_chats`
--
ALTER TABLE `room_chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room_chat_user` (`customer_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Users_Unq_Username` (`username`),
  ADD UNIQUE KEY `Users_Unq_Phone` (`phone`),
  ADD UNIQUE KEY `Users_Unq_Email` (`email`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Voucher_Unq_Code` (`code`);

--
-- Chỉ mục cho bảng `voucher_users`
--
ALTER TABLE `voucher_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_voucher_users_user` (`user_id`),
  ADD KEY `fk_voucher_users_voucher` (`voucher_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `category_specifications`
--
ALTER TABLE `category_specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `chat_details`
--
ALTER TABLE `chat_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `image_ratings`
--
ALTER TABLE `image_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `like_products`
--
ALTER TABLE `like_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `room_chats`
--
ALTER TABLE `room_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `voucher_users`
--
ALTER TABLE `voucher_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `fk_category_brand` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `category_specifications`
--
ALTER TABLE `category_specifications`
  ADD CONSTRAINT `fk_cateogry_specification` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `chat_details`
--
ALTER TABLE `chat_details`
  ADD CONSTRAINT `fk_chat_detail_room_chat` FOREIGN KEY (`room_chat_id`) REFERENCES `room_chats` (`id`),
  ADD CONSTRAINT `fk_chat_detail_user` FOREIGN KEY (`user_send`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD CONSTRAINT `fk_image_product_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `image_ratings`
--
ALTER TABLE `image_ratings`
  ADD CONSTRAINT `fk_image_rating_rating` FOREIGN KEY (`rating_id`) REFERENCES `ratings` (`id`);

--
-- Các ràng buộc cho bảng `like_products`
--
ALTER TABLE `like_products`
  ADD CONSTRAINT `fk_like_products_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_like_products_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_order_status` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `fk_order_payment_method` FOREIGN KEY (`payment_method`) REFERENCES `payment_methods` (`id`),
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_order_voucher` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_oder_item_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_order_items_variant` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Các ràng buộc cho bảng `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD CONSTRAINT `fk_product_spe` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_product_spe_spe` FOREIGN KEY (`category_specification_id`) REFERENCES `category_specifications` (`id`);

--
-- Các ràng buộc cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `fk_product_variants_prouduct` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_rating_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_rating_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `room_chats`
--
ALTER TABLE `room_chats`
  ADD CONSTRAINT `fk_room_chat_user` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `voucher_users`
--
ALTER TABLE `voucher_users`
  ADD CONSTRAINT `fk_voucher_users_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_voucher_users_voucher` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
