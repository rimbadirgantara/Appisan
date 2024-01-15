-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql309.infinityfree.com
-- Generation Time: Jan 15, 2024 at 05:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35681291_pinpiljur`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_11_25_235059_create_users_table', 1),
(11, '2023_12_14_133957_create_sekolah_table', 1),
(12, '2023_12_14_134320_create_hasil_kalkulasi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_kalkulasi`
--

CREATE TABLE `tbl_hasil_kalkulasi` (
  `id_kalkulasi` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_jurusan` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_hasil_kalkulasi`
--

INSERT INTO `tbl_hasil_kalkulasi` (`id_kalkulasi`, `id_user`, `id_siswa`, `nama_jurusan`, `nilai`, `created_at`, `updated_at`) VALUES
(84, 24, 2, 'Teknik Perkapalan', 0.85, '2024-01-12 07:33:37', '2024-01-12 07:33:37'),
(85, 24, 2, 'Teknik Perkapalan', 0.8, '2024-01-12 07:33:37', '2024-01-12 07:33:37'),
(86, 24, 6, 'Maritim', 0.9, '2024-01-12 07:33:37', '2024-01-12 07:33:37'),
(87, 29, 9, 'Maritim', 1, '2024-01-12 15:36:03', '2024-01-12 15:36:03'),
(110, 31, 15, 'Teknik Mesin', 0.633333, '2024-01-12 18:06:24', '2024-01-12 18:06:24'),
(111, 31, 16, 'Teknik Perkapalan', 0.833333, '2024-01-12 18:06:24', '2024-01-12 18:06:24'),
(114, 33, 20, 'Maritim', 1, '2024-01-12 19:22:17', '2024-01-12 19:22:17'),
(115, 34, 21, 'Maritim', 1, '2024-01-12 19:27:29', '2024-01-12 19:27:29'),
(224, 22, 13, 'Teknik Elektro', 0.54, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(225, 22, 14, 'Teknik Perkapalan', 0.836667, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(226, 22, 22, 'Teknik Mesin', 0.726667, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(227, 22, 23, 'Teknik Mesin', 0.69, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(228, 22, 24, 'Teknik Elektro', 0.62, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(229, 22, 25, 'Teknik Mesin', 0.673333, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(230, 22, 26, 'Teknik Elektro', 0.563333, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(231, 22, 27, 'Teknik Mesin', 0.666667, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(232, 22, 28, 'Teknik Perkapalan', 0.803333, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(233, 22, 29, 'Teknik Mesin', 0.67, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(234, 22, 30, 'Teknik Mesin', 0.676667, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(235, 22, 31, 'Teknik Elektro', 0.596667, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(236, 22, 31, 'Teknik Elektro', 0.62, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(237, 22, 32, 'Teknik Perkapalan', 0.766667, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(238, 22, 33, 'Maritim', 0.966667, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(239, 22, 34, 'Teknik Perkapalan', 0.763333, '2024-01-13 10:17:15', '2024-01-13 10:17:15'),
(240, 35, 35, 'Maritim', 1, '2024-01-13 15:35:30', '2024-01-13 15:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prekalkulasi`
--

CREATE TABLE `tbl_prekalkulasi` (
  `id_prekalkulasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `penghasilan_orang_tua` int(11) NOT NULL,
  `akreditas` int(11) NOT NULL,
  `beasiswa` int(11) NOT NULL,
  `ormas` int(11) NOT NULL,
  `nilai_semester_5` int(11) NOT NULL,
  `prestasi` int(11) NOT NULL,
  `fasilitas` int(11) NOT NULL,
  `dosen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prekalkulasi`
--

INSERT INTO `tbl_prekalkulasi` (`id_prekalkulasi`, `id_user`, `id_siswa`, `penghasilan_orang_tua`, `akreditas`, `beasiswa`, `ormas`, `nilai_semester_5`, `prestasi`, `fasilitas`, `dosen`, `created_at`, `updated_at`) VALUES
(23, 24, 2, 1, 2, 2, 1, 1, 2, 1, 1, '2024-01-11 09:26:56', '2024-01-11 09:26:56'),
(24, 24, 2, 1, 1, 2, 1, 1, 2, 1, 1, '2024-01-11 09:27:53', '2024-01-11 09:27:53'),
(25, 25, 8, 2, 2, 2, 2, 2, 1, 2, 1, '2024-01-11 10:15:11', '2024-01-11 10:15:11'),
(26, 22, 7, 1, 2, 3, 1, 1, 2, 2, 1, '2024-01-11 16:02:01', '2024-01-11 16:02:01'),
(27, 22, 4, 3, 1, 2, 2, 3, 3, 3, 2, '2024-01-11 16:02:22', '2024-01-11 16:02:22'),
(29, 24, 6, 1, 2, 1, 2, 2, 1, 1, 1, '2024-01-12 07:33:16', '2024-01-12 07:33:16'),
(30, 29, 9, 3, 2, 3, 2, 2, 2, 2, 1, '2024-01-12 15:35:58', '2024-01-12 15:35:58'),
(31, 22, 11, 4, 2, 3, 1, 2, 1, 3, 1, '2024-01-12 17:19:40', '2024-01-12 17:19:40'),
(32, 22, 8, 1, 2, 3, 1, 3, 1, 2, 2, '2024-01-12 17:20:19', '2024-01-12 17:20:19'),
(35, 31, 15, 1, 2, 1, 2, 1, 3, 2, 2, '2024-01-12 18:05:15', '2024-01-12 18:05:15'),
(36, 22, 13, 3, 1, 3, 1, 1, 1, 3, 2, '2024-01-12 18:05:27', '2024-01-12 18:05:27'),
(37, 31, 16, 4, 2, 2, 1, 3, 1, 3, 1, '2024-01-12 18:05:53', '2024-01-12 18:05:53'),
(38, 22, 14, 1, 2, 3, 1, 2, 3, 3, 1, '2024-01-12 18:06:14', '2024-01-12 18:06:14'),
(39, 33, 20, 5, 1, 1, 2, 1, 1, 1, 1, '2024-01-12 19:22:12', '2024-01-12 19:22:12'),
(40, 34, 21, 1, 1, 1, 2, 1, 2, 1, 1, '2024-01-12 19:27:24', '2024-01-12 19:27:24'),
(41, 22, 22, 2, 2, 2, 2, 1, 1, 2, 1, '2024-01-13 08:10:50', '2024-01-13 08:10:50'),
(42, 22, 23, 5, 1, 2, 2, 1, 1, 3, 1, '2024-01-13 08:14:04', '2024-01-13 08:14:04'),
(43, 22, 24, 3, 1, 3, 2, 3, 1, 3, 2, '2024-01-13 08:18:20', '2024-01-13 08:18:20'),
(44, 22, 25, 3, 1, 3, 1, 2, 2, 3, 1, '2024-01-13 08:20:54', '2024-01-13 08:20:54'),
(45, 22, 26, 4, 1, 3, 1, 2, 1, 3, 1, '2024-01-13 08:22:56', '2024-01-13 08:22:56'),
(46, 22, 27, 2, 1, 3, 1, 2, 1, 3, 1, '2024-01-13 08:24:43', '2024-01-13 08:24:43'),
(47, 22, 28, 3, 1, 1, 2, 2, 1, 3, 1, '2024-01-13 08:46:55', '2024-01-13 08:46:55'),
(48, 22, 29, 5, 2, 3, 1, 2, 1, 3, 1, '2024-01-13 08:49:36', '2024-01-13 08:49:36'),
(49, 22, 30, 5, 2, 2, 2, 3, 3, 3, 2, '2024-01-13 08:50:59', '2024-01-13 08:50:59'),
(50, 22, 31, 2, 2, 3, 1, 3, 1, 3, 2, '2024-01-13 09:00:03', '2024-01-13 09:00:03'),
(51, 22, 31, 2, 2, 3, 1, 3, 1, 3, 2, '2024-01-13 09:00:04', '2024-01-13 09:00:04'),
(53, 22, 32, 2, 1, 1, 1, 1, 3, 1, 1, '2024-01-13 09:07:13', '2024-01-13 09:07:13'),
(54, 22, 33, 3, 2, 2, 1, 2, 1, 1, 1, '2024-01-13 09:26:37', '2024-01-13 09:26:37'),
(55, 22, 34, 2, 2, 3, 1, 2, 2, 2, 1, '2024-01-13 10:15:07', '2024-01-13 10:15:07'),
(56, 35, 35, 2, 1, 1, 1, 3, 1, 1, 2, '2024-01-13 15:35:25', '2024-01-13 15:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id_sekolah` int(10) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id_sekolah`, `nama_sekolah`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SMAN 2 Bengkalis', 'JL.PRAMUKA BENGKALIS', 'Negeri', NULL, NULL),
(2, 'SMAN 2 BANTAN', 'JL.BUDI LUHUR', 'Negeri', NULL, NULL),
(3, 'SMKN 1 BENGKALIS', 'Jl. Simpang Ayam Meskom', 'Swasta', NULL, NULL),
(4, 'SMAN 1 BENGKALIS', 'JL Ahmad Yani', 'Negeri', NULL, NULL),
(5, 'SMAN 3 Bengkalis ', 'JL Patimura', 'Negeri', NULL, NULL),
(6, 'SMA 1 BUKIT BATU', 'JL.Ahmad Yani', 'Negeri', NULL, NULL),
(7, 'SMAN 2 BUKIT BATU', 'Jl. Pelajar', 'Negeri', NULL, NULL),
(8, 'SMAN 3 BUKIT BATU ', 'Jl. BUDI UTOMO', 'Negeri', NULL, NULL),
(9, 'SMAN 4 Bengkalis', 'Jl.Utama ', 'Negeri', NULL, NULL),
(10, 'MAN 1 BENGKALIS', 'Jl.Pembangunan 1', 'Negeri', NULL, NULL),
(11, 'SMAN 5 BENGKALIS', 'Jl. UTAMA SUNGAI BATANG', 'Negeri', NULL, NULL),
(12, 'SMKN 2 BENGKALIS', 'Jl.ASSALAM,Kelapa Pati', 'Negeri', NULL, NULL),
(13, 'SMKS DHARMA MAITREYA', 'Jl.Wonosari Tengah', 'Swasta', NULL, NULL),
(14, 'SMAS AL AMIN BENGKALIS', 'Jl.Antara Ujung', 'Swasta', NULL, NULL),
(15, 'MAS YPPI BENGKALIS', 'JL. A.YANI ', 'Swasta', NULL, NULL),
(16, 'MAS AR ROSYIDIYAH', 'JL. AWANG MAHMUDA GG. PELAJAR', 'Swasta', NULL, NULL),
(17, 'MAS DARUSSALAM', 'Jl.Sentosa', 'Swasta', NULL, NULL),
(18, 'SMKN 3 BENGKALIS', 'Jl.Masjid Desa Kelapapati', 'Negeri', NULL, NULL),
(19, 'SMAN 3 BANTAN', 'Jl. Perkebunan IV, Teluk Lancar, Kec. Bantan', 'Negeri', NULL, NULL),
(20, 'SMAN 1 BANTAN', 'Jl. Soekarno-Hatta, Selat Baru', 'Negeri', NULL, NULL),
(21, 'SMKN 1 BANTAN', 'Jl. Jend. Sudirman', 'Negeri', NULL, NULL),
(22, 'MAS AL ULUM BANTAN TENGAH', 'Jl. Jaya Purna, Bantan Tengah', 'Swasta', NULL, NULL),
(23, 'MAS DARUL ULUM BANTAN TUA', ' JL. Aliya No.1 Bantan Tua', 'Swasta', NULL, NULL),
(24, 'MAS AL HIDAYAH TELUK PAMBANG', 'Jl. Sriwijaya Simpang Empat Pambang Baru PAMPANG BARU BANTAN', 'Swasta', NULL, NULL),
(25, 'MAS MIFTAHUL JANNAH SELAT BARU', 'JL. SULTAN SYARIF QASIM SELATBARU', 'Swasta', NULL, NULL),
(26, 'MAS MIFTAHUL ULUM BANTAN AIR', ' JL. JEND. SUDIRMAN', 'Swasta', NULL, NULL),
(27, 'MAS NURUL HIDAYAH BANTAN TUA', ' JL. RAJIMUN', 'Swasta', NULL, NULL),
(28, 'MAS AL HUDA', 'JL. UTAMA', 'Swasta', NULL, NULL),
(29, 'MAS DARUL FALAH', 'JL. Pesantren', 'Swasta', NULL, NULL),
(30, 'SMAS AL AMIN BENGKALIS', 'JL. ANTARA UJUNG Gg. CEMPAKA PUTIH', 'Swasta', NULL, NULL),
(31, 'SMKN 1 BUKIT BATU', 'Jl. Jend. Sudirman', 'Negeri', NULL, NULL),
(32, 'SMKN 2 PENERBANGAN BUKIT BATU', ' JL. Lintas Sungai Pakning', 'Negeri', NULL, NULL),
(33, 'MAS NURUL HIKMAH', 'Jl. Hidayatullah Gg.hikmah', 'Swasta', NULL, NULL),
(34, 'MAN 2 BENGKALIS', 'JL. JENDERAL SUDIRMAN DOMPAS', 'Negeri', NULL, NULL),
(35, 'MAS AULADAN SHALEHAN', ' Jl. Jend. Sudirman, Lubuk Muda', 'Swasta', NULL, NULL),
(36, 'SMAN 1 MANDAU', ' JL. KOMPLEK PENDIDIKAN CPI', 'Negeri', NULL, NULL),
(37, 'SMAN 2 MANDAU', 'JL. JEND. SUDIRMAN', 'Negeri', NULL, NULL),
(38, 'SMAN 3 MANDAU', ' JL. TUANKU TAMBUSAI', 'Negeri', NULL, NULL),
(39, 'SMAN 4 MANDAU', 'Jl. Bathin Batuah', 'Negeri', NULL, NULL),
(40, 'SMAN 5 MANDAU', 'JL.SIDOREJO', 'Negeri', NULL, NULL),
(41, 'SMAN 6 MANDAU', ' JL. Lintas Duri Dumai KM 18 Sebangar', 'Negeri', NULL, NULL),
(42, 'SMAN 7 MANDAU', 'JL. RANGAU KM 11 DURI', 'Negeri', NULL, NULL),
(43, 'SMAN 8 MANDAU', 'JL. SEJAHTERA RT 01 RW 16', 'Negeri', NULL, NULL),
(44, 'SMAN 9 MANDAU', ' JL STADION, DURI', 'Negeri', NULL, NULL),
(45, 'SMAN 10 MANDAU', ' JL. LAMA DURI XIII', 'Negeri', NULL, NULL),
(46, 'MAS HUBBUL WATHAN', ' JL. JEND. SUDIRMAN', 'Swasta', NULL, NULL),
(47, 'MAS AL JAUHAR', 'JL. ASRAMA TRIBRATA PEMATANG PUDU MANDAU BENGKALIS RIAU ', 'Swasta', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` tinytext NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `kelas` tinyint(4) NOT NULL,
  `jenis_kelamin` tinytext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama_siswa`, `id_sekolah`, `kelas`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(13, 'Rosidah', 1, 12, 'Laki-laki', '2024-01-12 18:00:52', '2024-01-12 18:00:52'),
(14, 'Zuhri', 1, 12, 'Laki-laki', '2024-01-12 18:01:10', '2024-01-12 18:01:10'),
(15, 'Thoriq Nadaghois Suharyadi', 11, 12, 'Laki-laki', '2024-01-12 18:04:07', '2024-01-12 18:04:07'),
(16, 'Putri', 11, 12, 'Laki-laki', '2024-01-12 18:04:40', '2024-01-12 18:04:40'),
(17, 'Renki', 2, 12, 'Laki-laki', '2024-01-12 18:45:21', '2024-01-12 18:45:21'),
(18, 'Aryanto', 2, 12, 'Laki-laki', '2024-01-12 18:45:34', '2024-01-12 18:45:34'),
(19, 'Eve Antoinette Ichwan', 2, 12, 'Perempuan', '2024-01-12 18:46:05', '2024-01-12 18:46:05'),
(20, 'Sudin', 1, 12, 'Laki-laki', '2024-01-12 19:21:34', '2024-01-12 19:21:34'),
(21, 'Zainul', 15, 12, 'Laki-laki', '2024-01-12 19:26:45', '2024-01-12 19:26:45'),
(22, 'rizki aditya', 1, 12, 'Pilih Jenis Kelamin', '2024-01-13 08:04:59', '2024-01-13 08:04:59'),
(23, 'dimas kanjeng', 1, 11, 'Laki-laki', '2024-01-13 08:12:20', '2024-01-13 08:12:20'),
(24, 'febri valencia putri', 1, 10, 'Perempuan', '2024-01-13 08:15:57', '2024-01-13 08:15:57'),
(25, 'ayu andika', 1, 10, 'Perempuan', '2024-01-13 08:19:43', '2024-01-13 08:19:43'),
(26, 'vindi okta safitri', 1, 10, 'Perempuan', '2024-01-13 08:21:49', '2024-01-13 08:21:49'),
(27, 'irmanda syuhada', 1, 10, 'Perempuan', '2024-01-13 08:23:47', '2024-01-13 08:23:47'),
(28, 'shaila candra', 1, 12, 'Perempuan', '2024-01-13 08:46:05', '2024-01-13 08:46:05'),
(29, 'nurfaathira', 1, 12, 'Perempuan', '2024-01-13 08:48:51', '2024-01-13 08:48:51'),
(30, 'nur rahmadani', 1, 12, 'Perempuan', '2024-01-13 08:50:15', '2024-01-13 08:50:15'),
(31, 'willyam', 1, 12, 'Laki-laki', '2024-01-13 08:58:20', '2024-01-13 08:58:20'),
(32, 'tio marsauli', 1, 12, 'Perempuan', '2024-01-13 09:06:11', '2024-01-13 09:06:11'),
(33, 'stevany', 1, 12, 'Perempuan', '2024-01-13 09:24:23', '2024-01-13 09:24:23'),
(34, 'rosyidah', 1, 12, 'Perempuan', '2024-01-13 10:13:09', '2024-01-13 10:13:09'),
(35, 'Muhammad Iqbaal Hardani', 6, 12, 'Laki-laki', '2024-01-13 15:33:49', '2024-01-13 15:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `kelas` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pict` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `email`, `password`, `level`, `jenis_kelamin`, `id_sekolah`, `kelas`, `profile_pict`, `created_at`, `updated_at`) VALUES
(1, 'adminganteng', 'cakAdmin@proton.me', '$2y$12$5sRdChehZezjyV1neERSSeuCy9mJvQB6IVFUotZl4marZ5XR1VD1O', 'admin', 'Laki-Laki', NULL, NULL, '1705061753.jpg', NULL, '2024-01-12 20:48:20'),
(22, 'rimbadirgantara', 'rimba@mail.com', '$2y$12$pozkzoNnZsdaLN21b06fD.CpoyrgdY0sGgMHAZv6Xt.PL5wfqsJ5m', 'guru', 'Laki-laki', 1, '12', '1705062641.jpg', '2024-01-08 20:57:00', '2024-01-12 18:00:02'),
(31, 'ianvemas', 'ian@gmail.com', '$2y$12$y3OBDKcyPw2p/VvTvWRXaOtCXvxpD/9bbfO/bGg4HVV44GWLjOep.', 'guru', 'Laki-laki', 11, '12', 'avatar.png', '2024-01-12 18:03:26', '2024-01-12 18:24:30'),
(32, 'ramos', 'ramos@mail.com', '$2y$12$ucy2nyeKwu1wzm7.AfQhu.uaat8KRHA1u6SCHy5lVx4XBE2rL3pdW', 'guru', 'Laki-laki', 2, '10', 'avatar.png', '2024-01-12 18:44:52', '2024-01-12 20:46:43'),
(33, 'sartini', 'srtn@gmail.com', '$2y$12$PeL0drS1pnHCoat6/qwnfuT5Q372PTCOTq.B6h4db2Io5C8vgXjve', 'guru', 'Perempuan', 1, '12', 'avatar.png', '2024-01-12 19:20:36', '2024-01-12 19:20:36'),
(34, 'partuji', 'prtj@gmail.com', '$2y$12$K8gFVxcW09umOT3/WYi1aOADPUMrSSWLxpVn120q2ybyCsqkMTAaa', 'guru', 'Laki-laki', 15, '12', 'avatar.png', '2024-01-12 19:26:09', '2024-01-12 19:26:09'),
(35, 'shailacandra', 'shailacandra@gmail.com', '$2y$12$WG8F/1Vcmak8.2mTIitKpOkr0sFOu.wOwRQJ/QAnMmxod9Xz1BMGW', 'guru', 'Perempuan', 6, '12', 'avatar.png', '2024-01-13 15:32:49', '2024-01-13 15:32:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_hasil_kalkulasi`
--
ALTER TABLE `tbl_hasil_kalkulasi`
  ADD PRIMARY KEY (`id_kalkulasi`);

--
-- Indexes for table `tbl_prekalkulasi`
--
ALTER TABLE `tbl_prekalkulasi`
  ADD PRIMARY KEY (`id_prekalkulasi`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `tbl_users_username_unique` (`username`),
  ADD UNIQUE KEY `tbl_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_hasil_kalkulasi`
--
ALTER TABLE `tbl_hasil_kalkulasi`
  MODIFY `id_kalkulasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `tbl_prekalkulasi`
--
ALTER TABLE `tbl_prekalkulasi`
  MODIFY `id_prekalkulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id_sekolah` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
