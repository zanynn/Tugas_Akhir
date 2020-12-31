-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2020 pada 04.39
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mzid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_name`, `product_code`, `product_color`, `size`, `price`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(59, 55, 'Adidas Yeezy 350 Boost', 'SKU-SP32', 'Hitam', '42', 3000000, 2, 'zanynngoose@gmail.com', '2cE3jmZ4lfpo3mCqU4BgD4xZby6aNBzyxWty3mxG', '2020-12-27 00:01:48', '2020-12-27 00:01:48'),
(57, 52, 'Nike Air', 'SKU-SP22', 'Hijau', '42', 9000000, 2, 'zanynngoose@gmail.com', 'nuXZWOB0rMEPYYSttjwZZc79QExhrqkEM1EjovO7', '2020-12-21 19:14:02', '2020-12-21 19:14:02'),
(60, 53, 'Shoei X-14', 'SKU-HP22', 'Marc Marquez Livery', 'XL', 58000000, 1, 'zanynngoose@gmail.com', '2cE3jmZ4lfpo3mCqU4BgD4xZby6aNBzyxWty3mxG', '2020-12-27 00:09:39', '2020-12-27 00:09:39'),
(61, 51, 'AGV Pista GP-R', 'SKU-HP11', 'Hitam', 'L', 48000000, 1, 'zanynngoose@gmail.com', '2cE3jmZ4lfpo3mCqU4BgD4xZby6aNBzyxWty3mxG', '2020-12-27 00:09:57', '2020-12-27 00:09:57'),
(62, 53, 'Shoei X-14', 'SKU-HP22', 'Marc Marquez Livery', 'M', 58000000, 2, 'zanynngoose@gmail.com', 'ju5Sf9GcG9awzEzWMbMxq2YnTebgVgUGvEIwSWRC', '2020-12-28 22:18:07', '2020-12-28 22:18:07'),
(64, 51, 'AGV Pista GP-R', 'SKU-HP12', 'Hitam', 'XL', 48500000, 2, 'zanynngoose@gmail.com', 'ww7nMyzL7FPkwwhAaejyI1R6rykqS7kct5T0PSg3', '2020-12-29 13:04:43', '2020-12-29 13:04:43'),
(66, 54, 'Dior Dress Limited', 'SKU-DW12', 'Hitam', '62', 20000000, 5, 'zanynngoose@gmail.com', '1n6Ek2OAbxYt50z6IWQhAp3YVezbFYvROci7CjKt', '2020-12-29 23:16:47', '2020-12-29 23:16:47'),
(84, 53, 'Shoei X-14', 'SKU-HP22', 'Marc Marquez Livery', 'L', 58000000, 1, 'zanynngoose@gmail.com', 'Asw4RdOIKzdr2BuxTybQfo9YATLMWelraIB9U7IG', '2020-12-30 12:58:42', '2020-12-30 12:58:42'),
(73, 57, 'Daniel Wellington B36R9', 'SKU-JT23', 'Hitam', '6 in', 900000, 1, 'zanynngoose@gmail.com', 'EZNghtquO8qTaaVba9x1w5ANspobojgggrQjSg5C', '2020-12-30 08:26:01', '2020-12-30 08:26:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(32, 31, 'Dress', 'SubCategory Dress', 1, NULL, '2020-12-25 21:26:41', '2020-12-25 21:26:41'),
(31, 0, 'Baju', 'Category Baju', 1, NULL, '2020-12-25 21:26:07', '2020-12-25 21:26:07'),
(30, 29, 'Fullface', 'Subcategory Fullface', 1, NULL, '2020-12-20 04:07:13', '2020-12-20 04:07:13'),
(29, 0, 'Helm', 'Category Helm', 1, NULL, '2020-12-20 03:49:05', '2020-12-20 03:49:05'),
(28, 27, 'Sneakers', 'Subcategory Sneakers', 1, NULL, '2020-12-20 00:41:45', '2020-12-20 00:41:45'),
(27, 0, 'Sepatu', 'Category Sepatu', 1, NULL, '2020-12-20 00:40:54', '2020-12-20 00:40:54'),
(33, 0, 'Aksesoris', 'Category Aksesoris', 1, NULL, '2020-12-25 22:07:21', '2020-12-25 22:07:21'),
(34, 33, 'Jam Tangan', 'Sub Jam Tangan', 1, NULL, '2020-12-25 22:07:49', '2020-12-25 22:07:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Coupon001', 10, 'Percentage', '2021-01-01', 0, '2018-12-05 20:19:15', '2020-12-30 11:43:24'),
(7, 'happynewyear', 20, 'Percentage', '2021-01-02', 1, '2020-12-30 11:23:37', '2020-12-30 11:23:37'),
(8, 'mzhappy', 50, 'Percentage', '2021-01-01', 1, '2020-12-30 11:26:02', '2020-12-30 11:26:02'),
(9, 'christmas20', 20, 'Percentage', '2020-12-25', 1, '2020-12-30 11:27:09', '2020-12-30 11:27:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `province`, `pincode`, `mobile`, `created_at`, `updated_at`) VALUES
(4, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', 'Aceh', '65141', '089666930901', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 2),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2020_12_18_040609_create_categories_table', 3),
(9, '2020_12_18_075802_create_products_table', 4),
(10, '2020_12_18_024109_create_product_attributes_table', 5),
(11, '2020_12_18_055123_create_product_galleries_table', 6),
(12, '2020_12_18_070031_create_cart_table', 7),
(13, '2020_12_18_072535_create_coupons_table', 8),
(15, '2020_12_18_042342_create_countries_table', 10),
(19, '2020_12_18_043804_update_users_table', 14),
(17, '2020_12_18_093548_create_delivery_address_table', 12),
(18, '2020_12_18_024718_create_orders_table', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_poof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `pincode`, `province`, `mobile`, `coupon_code`, `coupon_amount`, `order_status`, `image_poof`, `payment_method`, `grand_total`, `session_id`, `created_at`, `updated_at`) VALUES
(61, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Aceh', '089666930901', 'mzhappy', '1500000', 'success', NULL, 'COD', '1500000', 'P0GXMocLmfitOaTb81j1EfBXgYsKJtD51mHStDJ8', '2020-12-30 19:53:32', '2020-12-30 19:53:32'),
(60, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Aceh', '089666930901', 'mzhappy', '1500000', 'unpaid', NULL, 'COD', '1500000', 'P0GXMocLmfitOaTb81j1EfBXgYsKJtD51mHStDJ8', '2020-12-30 19:53:27', '2020-12-30 19:53:27'),
(59, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Aceh', '089666930901', 'happynewyear', '1800000', 'paid', 'images/KdPgpyAdNxYWXYMBR0rSgQBtgpKhMZgbYnsAyl8h.jpg', 'Bank Mandiri', '7200000', 'P0GXMocLmfitOaTb81j1EfBXgYsKJtD51mHStDJ8', '2020-12-30 19:52:45', '2020-12-30 19:52:45'),
(58, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Aceh', '089666930901', 'happynewyear', '1800000', 'unpaid', NULL, 'Bank', '7200000', 'P0GXMocLmfitOaTb81j1EfBXgYsKJtD51mHStDJ8', '2020-12-30 19:52:21', '2020-12-30 19:52:21'),
(57, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Aceh', '089666930901', 'happynewyear', '19800000', 'success', NULL, 'COD', '79200000', 'P0GXMocLmfitOaTb81j1EfBXgYsKJtD51mHStDJ8', '2020-12-30 19:15:00', '2020-12-30 19:15:00'),
(56, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Aceh', '089666930901', 'happynewyear', '19800000', 'unpaid', NULL, 'COD', '79200000', 'P0GXMocLmfitOaTb81j1EfBXgYsKJtD51mHStDJ8', '2020-12-30 19:14:46', '2020-12-30 19:14:46'),
(55, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Jawa Timur', '089666930901', 'mzhappy', '29000000', 'success', NULL, 'COD', '29000000', 'Asw4RdOIKzdr2BuxTybQfo9YATLMWelraIB9U7IG', '2020-12-30 13:02:41', '2020-12-30 13:02:41'),
(54, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Jawa Timur', '089666930901', 'mzhappy', '29000000', 'unpaid', NULL, 'COD', '29000000', 'Asw4RdOIKzdr2BuxTybQfo9YATLMWelraIB9U7IG', '2020-12-30 12:59:34', '2020-12-30 12:59:34'),
(53, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Banten', '089666930901', 'mzhappy', '8000000', 'success', NULL, 'COD', '8000000', 'Asw4RdOIKzdr2BuxTybQfo9YATLMWelraIB9U7IG', '2020-12-30 12:56:37', '2020-12-30 12:56:37'),
(52, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Banten', '089666930901', 'mzhappy', '8000000', 'unpaid', NULL, 'COD', '8000000', 'Asw4RdOIKzdr2BuxTybQfo9YATLMWelraIB9U7IG', '2020-12-30 12:56:30', '2020-12-30 12:56:30'),
(51, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Jawa Timur', '089666930901', 'mzhappy', '20000000', 'paid', 'images/nc5NfgGVXoKssvT1DLmYfW81aKMpqHxbluzZDeTF.jpg', 'Bank Mandiri', '20000000', 'Asw4RdOIKzdr2BuxTybQfo9YATLMWelraIB9U7IG', '2020-12-30 12:06:40', '2020-12-30 12:06:40'),
(50, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Jawa Timur', '089666930901', 'mzhappy', '20000000', 'paid', 'images/dvaAclFiosqjE49svSl4kXBdGfUayqaWlnPuci8v.jpg', 'Bank Mandiri', '20000000', 'Asw4RdOIKzdr2BuxTybQfo9YATLMWelraIB9U7IG', '2020-12-30 12:02:46', '2020-12-30 12:02:46'),
(49, 8, 'zanynngoose@gmail.com', 'Muhammad Fauzan', 'Griya Shanta F-220', 'Malang Kota', '65141', 'Jawa Timur', '089666930901', 'mzhappy', '20000000', 'unpaid', NULL, 'Bank', '20000000', 'Asw4RdOIKzdr2BuxTybQfo9YATLMWelraIB9U7IG', '2020-12-30 11:57:41', '2020-12-30 11:57:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `code`, `color`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(55, 28, 'Adidas Yeezy 350', 'SP3', 'Hitam', 'Adidas Yeezy boosts V2 SPLY-350 Black Static Sepatu YEZZY Original\r\n\r\nSneaker Statis Yeezy Boost 350 V2 ini berasal dari adidas (Adidas).\r\nDetail desain: Jari kaki berbentuk almond, sol karet datar, tali, sol dalam dengan logo merek adidas.\r\n\r\nBAHAN:\r\nSole: karet 100%\r\nPermukaan: nilon 100%, nilon 100%, serat polyester 100%, spandex (serat elastis) 100%\r\nLapisan: serat polyester 100%', 3000000, 'images/6f31gaVaeJNuRhzAxSdbL0oYCtKdUdikZIi7ieeH.png', '2020-12-25 21:46:51', '2020-12-30 09:58:47'),
(54, 32, 'Dior Dress Limited', 'DW1', 'Hitam', '100% Silk, Polyester lace, crepe, no appliqués, basic solid color, round collar, sleeveless, no pockets, rear closure, hook-and-bar, zip, fully lined, small sized Length (from the back to the bottom of the dress) 85 cm', 20000000, 'images/OWtk0BQaTtI6wePKLAi4yB8juvE5G1sv6vrR3y2t.png', '2020-12-25 21:30:32', '2020-12-25 21:30:32'),
(51, 30, 'AGV Pista GP-R', 'HP1', 'Hitam', 'Helm AGV pista GP adalah generasi pertama pada seri pista GP. Helm yang diperuntukan racing dan circuit. Body aerodinamis dan kokoh berbahan full carbon dengan interior anti bakteri. memiliki fitur crown Busa adjustable. Kaca visor yg tebal terasa kokoh dan premium. Ratchet terbuat dari stainless utk menambah detail mewahnya helm ini.', 48000000, 'images/NamVF7dAJvDrF4l3GUaXghQzGCtRDspf6ZM8IIaB.png', '2020-12-20 04:09:03', '2020-12-25 21:11:44'),
(59, 28, 'Nike Air', 'SP2', 'Hijau', 'Teknologi Nike React memberikan pengendaraan yang sangat mulus, mengurangi bobot dan menambah fleksibilitas.\r\nBagian atas sintetis menampilkan kain super bernapas untuk rasa ringan yang tetap sejuk. Detail transparan membuat permainan kaus kaki Anda bersinar.\r\nKaret tumit hingga ujung kaki menambah traksi dan daya tahan.\r\nPelapis kaus kaki yang nyaman dan kain yang dapat bernapas membuat kaki Anda tetap sejuk.\r\nKerah empuk yang empuk dengan desain berpotongan rendah terasa nyaman.', 800000, 'images/MHhIZ7EJz3DUuT3IUaoeDm9HywcRhAC1CmMgJtgo.png', '2020-12-26 19:19:39', '2020-12-30 09:57:33'),
(53, 30, 'Shoei X-14', 'HP2', 'Marc Marquez Livery', 'Perbedaan antara kemenangan balapan dan finis kedua dapat ditentukan hanya dalam hitungan milidetik, itulah sebabnya Juara Dunia seperti Marc Marquez memilih SHOEI X-Fourteen yang serba baru untuk membantu memangkas waktu istirahat di setiap putaran. Track yang disertifikasi oleh pengendara tercepat di planet ini', 58000000, 'images/LwQYrfq3GAHx2Jl3R5MCd2kmTyM5e033GxOSGBSR.png', '2020-12-25 21:19:18', '2020-12-25 21:19:18'),
(49, 28, 'Nike Kyrie 5', 'SP1', 'Hitam', 'Kyrie Irving mendobrak pertahanan menggunakan persenjataan jurus dunia lain. Kyrie 5 memberikan serangan cepatnya dari semua sudut dengan teknologi bantalan baru yang selaras dengan bentuk lengkung dari sol luar. Baik saat mengalami kerusakan atau perbankan, Nike Air Zoom Turbo merespons dengan pengembalian energi yang cepat.', 8000000, 'images/7at1a6ZvaEFCIew4rEjfLUvxttmxAUpsjBbfSBbs.png', '2020-12-20 00:49:55', '2020-12-20 04:01:42'),
(56, 34, 'Rolex Daytona Gold', 'JT1', 'Emas', 'The Daytona’s chronograph functions are activated by pushers that screw down like the winding crown when they are not in use, guaranteeing waterproofness to 100 metres. One press to start, stop or reset the chronograph produces a crisp, clear click that was perfected using the most advanced technology.', 1000000, 'images/eR4VMQ490Lhi8W8GjIqvrMV3zOivu16JXr1TfXFQ.png', '2020-12-25 22:09:33', '2020-12-25 22:09:51'),
(57, 34, 'Daniel Wellington B36R9', 'JT2', 'Hitam', 'Koleksi Klasik, yang terkenal dengan garis-garisnya yang rapi dan desainnya yang sederhana, dibuat dengan mempertimbangkan pria dan wanita modern. Dengan dial minimalis dan pita coklat tua sempurna, arloji ini terlihat sangat elegan. Didandani atau didandani, jam tangan cantik ini akan menonjol di kerumunan.', 900000, 'images/pT59OtVNZjXphqirRQxJqQAx9roUtuZbpUsGtZIs.png', '2020-12-25 23:42:40', '2020-12-25 23:42:40'),
(58, 32, 'Channel Jisoo Dress', 'DW2', 'Hitam', '100% Silk, Polyester ace, crepe, no appliqués, basic solid color, round collar, sleeveless, no pockets, rear closure, hook-and-bar, zip, fully lined, small sized Length (from the back to the bottom of the dress) 85 cm', 800000, 'images/Oh27GzXeVFvah70lQtGj1nqUXed9Xq3HPfiklBKQ.png', '2020-12-25 23:54:15', '2020-12-25 23:54:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(70, 58, 'SKU-DW21', '61', 800000, 22, '2020-12-25 23:55:32', '2020-12-25 23:55:32'),
(69, 58, 'SKU-DW2', '62', 800000, 50, '2020-12-25 23:55:13', '2020-12-25 23:55:13'),
(68, 57, 'SKU-JT23', '6 in', 900000, 10, '2020-12-25 23:44:25', '2020-12-25 23:44:25'),
(67, 57, 'SKU-JT22', '6.5 in', 900000, 10, '2020-12-25 23:43:51', '2020-12-25 23:43:51'),
(66, 57, 'SKU-JT21', '7 in', 900000, 20, '2020-12-25 23:43:28', '2020-12-25 23:43:28'),
(65, 57, 'SKU-JT2', '7.5 in', 900000, 40, '2020-12-25 23:43:09', '2020-12-25 23:43:09'),
(64, 56, 'SKU-JT13', '6 in', 1000000, 10, '2020-12-25 23:28:55', '2020-12-25 23:28:55'),
(63, 56, 'SKU-JT12', '6.5 in', 1000000, 10, '2020-12-25 23:28:28', '2020-12-25 23:28:28'),
(62, 56, 'SKU-JT11', '7 in', 1000000, 10, '2020-12-25 23:28:03', '2020-12-25 23:28:03'),
(61, 56, 'SKU-JT1', '7.5 in', 1000000, 25, '2020-12-25 23:27:29', '2020-12-25 23:27:29'),
(60, 55, 'SKU-SP32', '43', 3000000, 10, '2020-12-25 21:49:33', '2020-12-25 21:49:33'),
(59, 55, 'SKU-SP31', '42', 3000000, 30, '2020-12-25 21:49:09', '2020-12-25 21:49:09'),
(58, 55, 'SKU-SP3', '41', 3000000, 25, '2020-12-25 21:48:43', '2020-12-25 21:48:43'),
(57, 54, 'SKU-DW12', '62', 20000000, 5, '2020-12-25 21:32:42', '2020-12-25 21:32:42'),
(56, 54, 'SKU-DW11', '61', 20000000, 10, '2020-12-25 21:32:21', '2020-12-25 21:32:21'),
(55, 54, 'SKU-DW1', '60', 20000000, 3, '2020-12-25 21:31:56', '2020-12-25 21:31:56'),
(54, 53, 'SKU-HP22', 'XL', 58000000, 8, '2020-12-25 21:21:10', '2020-12-25 21:21:10'),
(53, 53, 'SKU-HP21', 'L', 58000000, 20, '2020-12-25 21:20:33', '2020-12-25 21:20:33'),
(52, 53, 'SKU-HP2', 'M', 58000000, 25, '2020-12-25 21:19:56', '2020-12-25 21:19:56'),
(51, 52, 'SKU-SP22', '43', 9000000, 8, '2020-12-20 04:22:40', '2020-12-20 04:22:40'),
(45, 49, 'SKU-SP11', '42', 8100000, 8, '2020-12-20 00:51:18', '2020-12-20 04:02:49'),
(44, 49, 'SKU-SP1', '41', 8000000, 10, '2020-12-20 00:50:44', '2020-12-20 04:02:49'),
(50, 52, 'SKU-SP21', '42', 9000000, 5, '2020-12-20 04:21:54', '2020-12-20 04:21:54'),
(49, 52, 'SKU-SP2', '41', 9000000, 10, '2020-12-20 04:21:20', '2020-12-20 04:21:20'),
(48, 51, 'SKU-HP12', 'XL', 48500000, 10, '2020-12-20 04:11:30', '2020-12-20 04:11:30'),
(47, 51, 'SKU-HP11', 'L', 48000000, 5, '2020-12-20 04:10:52', '2020-12-20 04:10:52'),
(46, 51, 'SKU-HP1', 'M', 48000000, 10, '2020-12-20 04:10:18', '2020-12-20 04:10:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(56, 57, 'images/4CksXqqQ0mpvp4hug7rQHeNWAhM5b8bwgwJ5H90O.png', '2020-12-25 23:45:03', '2020-12-25 23:45:03'),
(55, 56, 'images/EcNJ0KHtxtxAYwKEY3lUMFexX6slkxhrlfYBM0pO.png', '2020-12-25 23:33:07', '2020-12-25 23:33:07'),
(54, 56, 'images/8LHOmUXWZ93AovOGP0D5yM5n97weJlhA3l5WZa6W.png', '2020-12-25 23:30:45', '2020-12-25 23:30:45'),
(53, 55, 'images/ntM9CN35t7cvmnLbRpUAuKsWgBtwrdGiyS6MyviM.png', '2020-12-25 21:51:27', '2020-12-25 21:51:27'),
(52, 55, 'images/ITYrYmN8YBdAgV1NbLcsgGDqQq4gTqXsVLO7utiE.png', '2020-12-25 21:51:21', '2020-12-25 21:51:21'),
(51, 55, 'images/ko49Y66FLNe0inEIxzyfYmaa6eRG7U5qtYF8ywMs.png', '2020-12-25 21:51:13', '2020-12-25 21:51:13'),
(50, 54, 'images/U6bke0o906ZB6yTyVxVn4vzJAQZIvqt8RgYj3inT.png', '2020-12-25 21:47:26', '2020-12-25 21:47:26'),
(49, 53, 'images/LbCr8Qxz4ZcdGOKe4OB9s5EgMfAyUrZMiuGen77v.png', '2020-12-25 21:47:09', '2020-12-25 21:47:09'),
(48, 54, 'images/bLyIf1VXMul1n6B7IKFdd9E9rsAlr6wqFm7dkddY.png', '2020-12-25 21:32:56', '2020-12-25 21:32:56'),
(47, 53, 'images/WwpzZbd0kt3E0TclJilkBbuOuspVOPMqQqVU2wCX.png', '2020-12-25 21:21:30', '2020-12-25 21:21:30'),
(46, 52, 'images/Vsp6kEIDyGczRyTWEWa7WDPFxx9bZmbTV1GVsvFd.png', '2020-12-20 04:24:04', '2020-12-20 04:24:04'),
(45, 52, 'images/IF6srRlgOiAvxb0m6583GK7DTQFjirUAqjOqsAj8.png', '2020-12-20 04:23:45', '2020-12-20 04:23:45'),
(44, 51, 'images/L7KZytjtD9HbVb3EJe0iLlBAwwXyz9Hcki7BSHXy.png', '2020-12-20 04:13:39', '2020-12-20 04:13:39'),
(43, 51, 'images/PMJSf7kpCuuDSzuyWEZ2Eiet10Ql2aQeZ7fwqfFP.png', '2020-12-20 04:13:23', '2020-12-20 04:13:23'),
(42, 51, 'images/IvtoQSe4IfEjylGErrp8DeIps4HXk1fwB4oU1ufa.png', '2020-12-20 04:13:04', '2020-12-20 04:13:04'),
(41, 49, 'images/g1y54djrURMhN8r3IWlvQd4DNUVqq37iW9rC475N.png', '2020-12-20 02:25:50', '2020-12-20 02:25:50'),
(40, 49, 'images/k4zZp2sEPhMLSrZ8Su2jlbzmzyrIaxJlm2DetgVe.png', '2020-12-20 02:25:39', '2020-12-20 02:25:39'),
(57, 57, 'images/x3QeENrmMErtu7WNTVwaBaKC6kKngVhurUgsAaln.png', '2020-12-25 23:45:08', '2020-12-25 23:45:08'),
(59, 58, 'images/zL6iNel4Sw9WjC30PDg6CzOFbj67KFapXxhusBte.png', '2020-12-25 23:55:55', '2020-12-25 23:55:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `province_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`id`, `province_code`, `province_name`, `created_at`, `updated_at`) VALUES
(2, '11', 'Aceh', NULL, NULL),
(3, '12', 'Sumatra Utara', NULL, NULL),
(4, '13', 'Sumatra Barat', NULL, NULL),
(5, '14', 'Riau', NULL, NULL),
(6, '15', 'Jambi', NULL, NULL),
(7, '16', 'Sumatra Selatan', NULL, NULL),
(8, '17', 'Bengkulu', NULL, NULL),
(9, '18', 'Lampung', NULL, NULL),
(10, '19', 'Kep. Bangka Belitung', NULL, NULL),
(11, '21', 'Kep. Riau', NULL, NULL),
(12, '31', 'DKI Jakarta', NULL, NULL),
(13, '32', 'Jawa Barat', NULL, NULL),
(14, '33', 'Jawa Tengah', NULL, NULL),
(15, '34', 'DI Yogyakarta', NULL, NULL),
(16, '35', 'Jawa Timur', NULL, NULL),
(17, '36', 'Banten', NULL, NULL),
(18, '51', 'Bali', NULL, NULL),
(19, '52', 'Nusa Tenggara Barat', NULL, NULL),
(20, '53', 'Nusa Tenggara Timur', NULL, NULL),
(21, '61', 'Kalimantan Barat', NULL, NULL),
(22, '62', 'Kalimantan Tengah', NULL, NULL),
(23, '63', 'Kalimantan Selatan', NULL, NULL),
(24, '64', 'Kalimantan Timur', NULL, NULL),
(25, '65', 'Kalimantan Utara', NULL, NULL),
(26, '71', 'Sulawesi Utara', NULL, NULL),
(27, '72', 'Sulawesi Tengah', NULL, NULL),
(28, '73', 'Sulawesi Selatan', NULL, NULL),
(29, '74', 'Sulawesi Tenggara', NULL, NULL),
(30, '75', 'Gorontalo', NULL, NULL),
(31, '76', 'Sulawesi Barat', NULL, NULL),
(32, '81', 'Maluku', NULL, NULL),
(33, '82', 'Maluku Utara', NULL, NULL),
(34, '91', 'Papua', NULL, NULL),
(35, '92', 'Papua Barat', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `image`, `remember_token`, `created_at`, `updated_at`, `address`, `city`, `province`, `pincode`, `mobile`) VALUES
(12, 'Jennie', 'jennie@gmail.com', NULL, '$2y$10$vQcKpsGso/p.oIlsr0U3XeexYF1InKM.6OdnTJWGwgxLDp9rcO6c.', 'User', 'images/3IYdeU4tKzUTGGiWutdc2JLPl3d5yjEjjrfW7ndb.jpg', 'ewDX8QOv9RpQg7qwM6b2bdvyFBeP7YqPysbnzDgOBdhTX97903erANgFFEv8', '2020-12-30 13:44:32', '2020-12-30 13:52:55', 'Green Coffe 213', 'South Tangerang', 'Banten', '15314', '081398574901'),
(8, 'Muhammad Fauzan', 'zanynngoose@gmail.com', NULL, '$2y$10$Q4tncCF5XmQLyN5UwkrRAOrPf8pYO0AT/FLVKbhLgS9HMN3JIXxQS', 'User', 'images/FOVdOOkpsyUrf1ly7rS4RJ0ummym4KiRutI1kZPb.png', '2HWLOA6hccmkn8eVzxOMWk5TdWuT70wiif9jpHbfdBy6wUwC6wyxL2VSpAL3', '2020-12-19 20:32:58', '2020-12-30 11:19:15', 'Griya Shanta F-220', 'Malang Kota', 'Aceh', '65141', '089666930901'),
(10, 'Abdul Rahman Saleh', 'elrahman259@gmail.com', NULL, '$2y$10$8yAvTJJZwlKRt8MFtWDQXuAsjYjJ/obLY8fgYYjx1Wc.BrX9i4FnW', 'Administrator', 'images/hjU1f2O33R6gIgcAgNpj6MJra54Ym7pe8FaIJfXj.png', 'PQKCTH04MFinsh295bUft0p9FED2sySHq1wLoGVa3PkzsD2xyIh6T33ay19d', '2020-12-30 11:14:19', '2020-12-30 11:14:19', 'Jogonalan no 99', 'Pasuruan', 'Jawa Timur', '12312', '083123231233');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`name`);

--
-- Indeks untuk tabel `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
