-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 02:10 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semenpadang`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_izin`
--

CREATE TABLE `form_izin` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `departemen` varchar(500) NOT NULL,
  `perusahaan` varchar(500) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `jenis` enum('Izin Baru','Perpanjangan','Pengaktifan Kembali','Penonaktifan') NOT NULL,
  `jenis_kendaraan` enum('Dump Truck','Buldozer','Grader','Loader','Excavator','Drill Machine','Light Vehicle') NOT NULL,
  `jenis_permintaan` enum('Permanent','Sementara','','') NOT NULL,
  `sementara_dari` varchar(200) DEFAULT NULL,
  `sementara_sampai` varchar(200) DEFAULT NULL,
  `jenis_izin` enum('Pit Worker Permit','In Pit Access Only','Full Pit Access','') NOT NULL,
  `alasan` varchar(500) NOT NULL,
  `nama_pjo` varchar(500) NOT NULL,
  `nama_kasie` varchar(500) NOT NULL,
  `nama_kepala_teknik` varchar(500) NOT NULL,
  `nama_kasie_hse` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_izin`
--

INSERT INTO `form_izin` (`id`, `nama`, `departemen`, `perusahaan`, `nip`, `jenis`, `jenis_kendaraan`, `jenis_permintaan`, `sementara_dari`, `sementara_sampai`, `jenis_izin`, `alasan`, `nama_pjo`, `nama_kasie`, `nama_kepala_teknik`, `nama_kasie_hse`, `created_at`, `updated_at`) VALUES
(3, 'dasd', 'dasd', 'das', '12312312', 'Izin Baru', 'Dump Truck', 'Permanent', NULL, NULL, 'Pit Worker Permit', 'Wajib Perusahaan', 'ad', 'das', 'das', 'das', '2018-08-28 18:56:26', '2018-08-28 18:56:26'),
(6, 'Ms. Mary Barton', 'Anthropology Teacher', 'bandung', '69721903', 'Izin Baru', 'Dump Truck', 'Permanent', NULL, NULL, 'Pit Worker Permit', 'Wajib Perusahaan', 'adsa', 'dasd', 'das', 'das', '2018-09-04 20:43:07', '2018-09-04 20:43:07'),
(7, 'a', 'das', 'das', 'aadasdasdas', 'Izin Baru', 'Grader', 'Permanent', NULL, NULL, 'In Pit Access Only', 'Syarat Pekerjaan', 'asd', 'das', 'das', 'das', '2018-09-05 00:17:45', '2018-09-05 00:17:45'),
(8, 'ads', 'das', 'daas', 'dasdas', 'Perpanjangan', 'Loader', 'Permanent', NULL, NULL, 'Pit Worker Permit', 'Syarat Pekerjaan', 'asd', 'dsac', 'cadc', 'csdcsd', '2018-09-05 00:55:36', '2018-09-05 00:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `pekerja_id` int(11) NOT NULL,
  `dari` varchar(100) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `pekerja_id`, `dari`, `kepada`, `deskripsi`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 614, 'administrasi', 'kepala_unit', 'Mengirim berkas pekerja baru', 'sudah', NULL, '2018-09-05 00:55:36', '2018-09-05 01:41:41'),
(8, 612, 'kepala_unit', 'tim_assesment', 'Berkas di terima kepala unit', 'sudah', NULL, '2018-09-05 00:57:59', '2018-09-05 01:50:49'),
(9, 614, 'kepala_unit', 'administrasi', 'Berkas di tolak kepala unit', 'sudah', NULL, '2018-09-05 00:58:12', '2018-09-05 01:29:38'),
(10, 612, 'tim_assesment', 'kepala_biro', 'Berkas Lulus verifikasi oleh tim assesment', 'sudah', NULL, '2018-09-05 00:58:51', '2018-09-05 01:57:02'),
(11, 571, 'tim_assesment', 'administrasi', 'Berkas Tidak Lulus verifikasi oleh tim assesment', 'sudah', NULL, '2018-09-05 00:58:56', '2018-09-05 01:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `pekerja`
--

CREATE TABLE `pekerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `agama` varchar(200) NOT NULL,
  `golongan_darah` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `alamat_kantor` varchar(255) NOT NULL,
  `riwayat_pendidikan` varchar(255) NOT NULL,
  `sertifikasi_keahlian` varchar(500) NOT NULL,
  `pendidikan_khusus` varchar(500) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `komentar` varchar(224) DEFAULT NULL,
  `tgl_blok` timestamp NULL DEFAULT NULL,
  `berkas_assesment` varchar(100) DEFAULT NULL,
  `tgl_aktif` varchar(50) DEFAULT NULL,
  `tgl_expired` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerja`
--

INSERT INTO `pekerja` (`id`, `nama`, `nip`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `golongan_darah`, `alamat`, `email`, `telepon`, `hp`, `jabatan`, `unit_kerja`, `alamat_kantor`, `riwayat_pendidikan`, `sertifikasi_keahlian`, `pendidikan_khusus`, `status`, `komentar`, `tgl_blok`, `berkas_assesment`, `tgl_aktif`, `tgl_expired`, `created_at`, `updated_at`) VALUES
(509, 'Miss Anita Krajcik', '146927181', 'Laki-laki', 'East Chandler', '1997-03-16', 'Atheis', 'O', 'malang', 'bogisich.rick@bauch.com', '(844) 686-7780', '(247) 944-0147 x35240', 'ut', 'Movie Director oR Theatre Director', 'bandung', 'S2', 'molestiae', 'recusandae', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:10', NULL),
(510, 'Mrs. Bulah Gislason IV', '707497961', 'Laki-laki', 'Larkinmouth', '1997-03-16', 'Budha', 'AB', 'malang', 'csmith@boyle.info', '855.633.2739', '1-391-724-3450', 'ipsa', 'Algorithm Developer', 'padang', 'S2', 'qui', 'modi', 'nok', NULL, NULL, '', '', '', '2018-08-16 08:33:10', NULL),
(511, 'Karina Schultz IV', '52', 'Laki-laki', 'Port Wilfrid', '1997-03-16', 'Atheis', 'O', 'malang', 'lennie61@russel.com', '877.543.4767', '1-586-803-3067 x80821', 'porro', 'Medical Transcriptionist', 'malang', 'SMA', 'in', 'assumenda', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:10', NULL),
(512, 'Isabel Beahan', '3', 'Laki-laki', 'Lake Shannonmouth', '1997-03-16', 'Islam', 'B', 'payakumbuh', 'ddickinson@gmail.com', '(844) 704-6219', '+1 (485) 930-4783', 'sed', 'Physical Therapist Aide', 'malang', 'SMA', 'itaque', 'in', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:10', NULL),
(513, 'Sydnie Walker', '306025', 'Laki-laki', 'Pourosfurt', '1997-03-16', 'Hindu', 'O', 'malang', 'franecki.jaeden@hotmail.com', '(855) 288-4582', '+1-262-819-9821', 'quasi', 'Marking Machine Operator', 'malang', 'SMA', 'commodi', 'optio', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-27 17:47:34', '2018-08-27 10:47:34'),
(514, 'Ken Dicki', '7425335', 'Laki-laki', 'New Ryleigh', '1997-03-16', 'Budha', 'B', 'padang', 'manuel.braun@yahoo.com', '844-349-7730', '269-209-1645 x61543', 'sed', 'Psychiatric Aide', 'bandung', 'S1', 'eos', 'vel', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:10', NULL),
(515, 'Carroll Monahan', '9693967', 'Laki-laki', 'Tomasafurt', '1997-03-16', 'Islam', 'AB', 'bandung', 'bogan.laisha@yahoo.com', '1-855-902-6248', '(336) 581-4550 x885', 'ipsam', 'Civil Drafter', 'malang', 'S1', 'nemo', 'eos', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-27 17:25:46', '2018-08-27 10:25:46'),
(517, 'Joesph Reinger', '8874355', 'Perempuan', 'New Allanstad', '1997-03-16', 'Hindu', 'A', 'padang', 'kilback.magali@hotmail.com', '(877) 827-9238', '(880) 969-5959', 'sapiente', 'Cultural Studies Teacher', 'bandung', 'S2', 'quisquam', 'mollitia', 'lulus', NULL, NULL, 'asds.pdf', '', '', '2018-09-04 19:25:18', '2018-09-04 12:25:18'),
(519, 'Nathanial Homenick I', '4444372', 'Laki-laki', 'Port Ritatown', '1997-03-16', 'Budha', 'AB', 'malang', 'angeline13@durgan.net', '800.764.5313', '+1 (863) 852-6219', 'vitae', 'Manager of Air Crew', 'malang', 'S1', 'similique', 'non', 'tidak lulus', NULL, '2019-02-28 01:39:52', '', '', '', '2018-08-28 08:39:52', '2018-08-28 01:39:52'),
(520, 'Brittany Kuphal I', '98196393', 'Perempuan', 'Schadenbury', '1997-03-16', 'Budha', 'O', 'malang', 'domenic.miller@schmitt.org', '844.591.4313', '1-537-996-0009 x8451', 'saepe', 'Printing Press Machine Operator', 'payakumbuh', 'S2', 'corporis', 'temporibus', 'aktif', NULL, NULL, '', '', '', '2018-08-16 08:33:11', NULL),
(522, 'Ms. Olga Mertz I', '3', 'Laki-laki', 'North Jeramyborough', '1997-03-16', 'Hindu', 'A', 'malang', 'elwin.sporer@padberg.com', '1-844-565-4995', '1-523-345-2886 x48405', 'qui', 'Surveying and Mapping Technician', 'payakumbuh', 'S1', 'quod', 'iste', 'tidak lulus', NULL, '2019-02-28 02:09:35', '', '', '', '2018-08-28 09:09:35', '2018-08-28 02:09:35'),
(523, 'Dr. Rhett Reichel I', '17986', 'Laki-laki', 'North Kierashire', '1997-03-16', 'Hindu', 'AB', 'payakumbuh', 'mozell88@yahoo.com', '866.245.6033', '+1 (746) 328-2657', 'harum', 'Coroner', 'malang', 'S2', 'inventore', 'quia', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:11', NULL),
(526, 'Mozell Jacobson', '60246', 'Perempuan', 'South Stephon', '1997-03-16', 'Atheis', 'B', 'padang', 'loraine.hand@medhurst.org', '888-832-6338', '519-256-1443 x790', 'pariatur', 'Library Science Teacher', 'padang', 'S1', 'inventore', 'ullam', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:11', NULL),
(528, 'Keshaun Bahringer Jr.', '680734', 'Laki-laki', 'North Camille', '1997-03-16', 'Atheis', 'O', 'padang', 'qmccullough@gutkowski.com', '866-990-8453', '458-417-7428 x1596', 'voluptate', 'Fitness Trainer', 'padang', 'SMA', 'excepturi', 'aut', 'ok', NULL, NULL, '', '', '', '2018-08-28 09:07:44', '2018-08-28 02:07:44'),
(529, 'Dr. Viva Bernier MD', '5', 'Perempuan', 'Port Lenora', '1997-03-16', 'Budha', 'A', 'padang', 'jabari01@hotmail.com', '(855) 638-0480', '235.515.1131 x9255', 'rerum', 'Technical Director', 'malang', 'S2', 'atque', 'culpa', 'aktif', NULL, NULL, '', '', '', '2018-08-16 08:33:11', NULL),
(531, 'Brianne Okuneva', '5973', 'Perempuan', 'Framiside', '1997-03-16', 'Islam', 'AB', 'jakarta', 'cade32@flatley.net', '(855) 374-5881', '(547) 585-3037', 'dolorum', 'Craft Artist', 'malang', 'S2', 'et', 'magni', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:11', NULL),
(532, 'Dominique Dickinson', '51971011', 'Perempuan', 'Myahtown', '1997-03-16', 'Atheis', 'AB', 'padang', 'parker.diana@hotmail.com', '(866) 705-1127', '818-257-9613 x187', 'eos', 'Hand Trimmer', 'malang', 'S1', 'est', 'minus', 'tidak lulus', NULL, '2019-02-28 02:08:24', '', '', '', '2018-08-28 09:08:24', '2018-08-28 02:08:24'),
(533, 'Princess McKenzie', '818636561', 'Perempuan', 'West Shakiraport', '1997-03-16', 'Atheis', 'B', 'malang', 'lbahringer@daugherty.net', '1-888-491-7760', '1-367-896-7691', 'minus', 'Director Religious Activities', 'padang', 'S2', 'repudiandae', 'sunt', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:11', NULL),
(534, 'Marlene Beahan I', '97', 'Perempuan', 'North Lavina', '1997-03-16', 'Islam', 'A', 'malang', 'reinhold.zboncak@hotmail.com', '(844) 255-0390', '(983) 880-4304 x5700', 'aut', 'Molding and Casting Worker', 'payakumbuh', 'S2', 'sint', 'modi', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:11', NULL),
(535, 'Emely Reichert', '719647', 'Perempuan', 'Kuphalville', '1997-03-16', 'Budha', 'A', 'padang', 'howell71@hotmail.com', '844.254.2348', '562-987-0155 x77332', 'eveniet', 'Management Analyst', 'malang', 'SMA', 'modi', 'est', 'ok', NULL, NULL, '', '', '', '2018-08-16 08:33:11', NULL),
(536, 'Prof. Raoul Morissette Sr.', '577794740', 'Perempuan', 'North Tristianfurt', '1997-03-16', 'Budha', 'A', 'malang', 'vbeatty@veum.com', '(888) 240-5007', '378-990-4939', 'eos', 'Milling Machine Operator', 'jakarta', 'S1', 'voluptatibus', 'aut', 'tidak lulus', NULL, '2019-02-28 02:10:02', '', '', '', '2018-08-28 09:10:02', '2018-08-28 02:10:02'),
(537, 'Cole Ledner', '45', 'Perempuan', 'Zariamouth', '1997-03-16', 'Islam', 'A', 'padang', 'ojohns@schoen.com', '844-290-2305', '809.445.8192 x2918', 'quo', 'Interpreter OR Translator', 'malang', 'S2', 'cum', 'veritatis', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:11', NULL),
(538, 'Jasmin Glover', '18039', 'Perempuan', 'North Loniemouth', '1997-03-16', 'Budha', 'A', 'payakumbuh', 'reinger.deon@gmail.com', '844-738-7087', '+1-421-457-6889', 'suscipit', 'Engine Assembler', 'malang', 'S1', 'velit', 'et', 'ok', NULL, NULL, '', '', '', '2018-08-16 08:33:11', NULL),
(539, 'Prof. Skylar Homenick MD', '9474366', 'Perempuan', 'North Kylieshire', '1997-03-16', 'Islam', 'O', 'padang', 'xyundt@jones.org', '1-844-719-8418', '(218) 273-4869 x808', 'inventore', 'Public Health Social Worker', 'malang', 'S1', 'aliquam', 'sed', 'ok', NULL, NULL, '', '', '', '2018-08-16 08:33:11', NULL),
(540, 'Freeman Schuster V', '6', 'Perempuan', 'Goldenville', '1997-03-16', 'Atheis', 'A', 'malang', 'veronica.johnston@anderson.info', '1-888-429-2833', '323-828-1659 x0766', 'doloremque', 'Loan Officer', 'padang', 'S1', 'incidunt', 'quo', 'aktif', NULL, NULL, 'a.pdf', '', '', '2018-09-04 19:05:26', '2018-09-04 12:05:26'),
(541, 'Mr. Consuelo Nikolaus II', '8583', 'Perempuan', 'East Geneton', '1997-03-16', 'Atheis', 'A', 'bandung', 'ddaniel@balistreri.com', '866.229.1359', '1-225-833-6427 x82488', 'ducimus', 'Veterinary Assistant OR Laboratory Animal Caretaker', 'bandung', 'S1', 'repellendus', 'harum', 'aktif', NULL, NULL, '', '', '', '2018-08-16 08:39:56', '2018-08-16 01:39:56'),
(542, 'Alaina Morissette', '39', 'Laki-laki', 'Hauckside', '1997-03-16', 'Atheis', 'A', 'malang', 'friesen.kacie@yahoo.com', '855-960-5030', '747.909.3285', 'ullam', 'Human Resources Specialist', 'bandung', 'SMA', 'sunt', 'architecto', 'aktif', NULL, NULL, '', '', '', '2018-08-16 08:33:12', NULL),
(543, 'Emanuel Swaniawski III', '975697253', 'Perempuan', 'South Beauland', '1997-03-16', 'Atheis', 'AB', 'malang', 'julia.considine@gaylord.net', '855-755-2044', '+1-937-623-5409', 'perspiciatis', 'Library Assistant', 'bandung', 'SMA', 'praesentium', 'eos', 'nok', NULL, NULL, '', '', '', '2018-08-16 08:33:12', NULL),
(544, 'Eleanora Witting', '3', 'Laki-laki', 'West Damiantown', '1997-03-16', 'Hindu', 'AB', 'malang', 'dolly.spinka@yundt.info', '855.305.3709', '(868) 347-5900 x5932', 'et', 'Rigger', 'jakarta', 'S1', 'quos', 'libero', 'nok', NULL, NULL, '', '', '', '2018-08-28 04:14:03', '2018-08-27 21:14:03'),
(547, 'Keshaun Collins IV', '2364807', 'Laki-laki', 'New Lesly', '1997-03-16', 'Atheis', 'AB', 'malang', 'rschaden@yahoo.com', '888.542.2365', '+1.339.214.7936', 'beatae', 'Heating Equipment Operator', 'malang', 'S2', 'voluptas', 'corporis', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:12', NULL),
(549, 'Prof. Rebeca Hand', '740372', 'Laki-laki', 'Goldnerville', '1997-03-16', 'Atheis', 'B', 'jakarta', 'raphael65@mayert.com', '877-985-9124', '+1.754.705.9393', 'magnam', 'Movers', 'jakarta', 'S2', 'ut', 'reiciendis', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:12', NULL),
(551, 'Prof. Zachariah Hamill V', '22747', 'Laki-laki', 'Port Mikelmouth', '1997-03-16', 'Atheis', 'AB', 'malang', 'deon36@romaguera.com', '1-877-796-4920', '729-808-7529 x731', 'repellendus', 'Mathematical Science Teacher', 'padang', 'S2', 'sit', 'et', 'lulus', NULL, NULL, 'alan label.pdf', '', '', '2018-09-04 19:24:49', '2018-09-04 12:24:49'),
(554, 'Reva Ritchie PhD', '504693706', 'Laki-laki', 'Port Elodyview', '1997-03-16', 'Hindu', 'O', 'padang', 'stokes.dave@okuneva.net', '877.859.3005', '1-549-536-7212', 'accusamus', 'Excavating Machine Operator', 'malang', 'SMA', 'rerum', 'vel', 'ok', NULL, NULL, '', '', '', '2018-09-04 18:50:40', NULL),
(555, 'Ray Friesen', '59978', 'Laki-laki', 'South Shaun', '1997-03-16', 'Islam', 'O', 'payakumbuh', 'wcrona@vonrueden.com', '888.658.3606', '547-703-2802', 'et', 'Sawing Machine Tool Setter', 'jakarta', 'SMA', 'aut', 'accusantium', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:12', NULL),
(556, 'Mrs. Augustine Pfeffer V', '54839', 'Perempuan', 'New Clydeport', '1997-03-16', 'Atheis', 'A', 'malang', 'clint.hermiston@yahoo.com', '855.783.9054', '(604) 648-6270 x5319', 'saepe', 'Tire Builder', 'malang', 'S2', 'et', 'ipsam', 'aktif', NULL, NULL, 'kk.pdf', '2018-09-04', '2018-09-06', '2018-09-04 19:40:11', '2018-09-04 12:40:11'),
(557, 'Aylin Beier', '751836', 'Laki-laki', 'Natashashire', '1997-03-16', 'Budha', 'AB', 'bandung', 'patience12@gibson.biz', '1-866-830-5301', '891.405.7856 x515', 'consequatur', 'Social Worker', 'bandung', 'S2', 'ex', 'asperiores', 'lulus', NULL, NULL, 'alan label.pdf', '', '', '2018-09-04 19:06:02', '2018-09-04 12:06:02'),
(558, 'Prof. Erling White', '444237872', 'Laki-laki', 'South Destanymouth', '1997-03-16', 'Hindu', 'AB', 'payakumbuh', 'zkassulke@yahoo.com', '(800) 285-8652', '1-628-265-2907 x9346', 'repellat', 'Network Admin OR Computer Systems Administrator', 'malang', 'SMA', 'beatae', 'labore', 'ok', NULL, NULL, '', '', '', '2018-09-04 18:50:40', NULL),
(559, 'Arno Cronin', '90090', 'Laki-laki', 'Aniyaborough', '1997-03-16', 'Hindu', 'B', 'bandung', 'joe31@gmail.com', '877.330.2918', '589-539-2192 x65213', 'dolore', 'School Social Worker', 'bandung', 'S1', 'a', 'qui', 'aktif', NULL, NULL, '', '', '', '2018-08-28 09:10:47', '2018-08-28 02:10:47'),
(560, 'Dr. Norbert Green III', '95070', 'Perempuan', 'South Adolphus', '1997-03-16', 'Hindu', 'O', 'jakarta', 'heaney.anderson@quigley.net', '888-767-8154', '1-905-458-4571 x36134', 'quo', 'Well and Core Drill Operator', 'malang', 'S1', 'deserunt', 'deserunt', 'nok', NULL, NULL, '', '', '', '2018-08-16 08:33:12', NULL),
(561, 'April Dietrich', '883', 'Perempuan', 'Port Jody', '1997-03-16', 'Islam', 'O', 'payakumbuh', 'smitham.sebastian@gmail.com', '855.288.5139', '1-208-966-7070', 'quibusdam', 'Pediatricians', 'malang', 'S1', 'aliquid', 'optio', 'ok', NULL, NULL, '', '', '', '2018-08-16 08:33:13', NULL),
(562, 'Britney Kreiger', '12887', 'Laki-laki', 'South Hailie', '1997-03-16', 'Islam', 'AB', 'bandung', 'phintz@labadie.com', '866.208.9828', '(208) 474-1707', 'soluta', 'Construction Carpenter', 'malang', 'S2', 'iste', 'natus', 'lulus', NULL, NULL, 'asds.pdf', '', '', '2018-09-04 19:06:11', '2018-09-04 12:06:11'),
(563, 'Dr. Harold Johnston PhD', '2', 'Perempuan', 'New Jacquelyn', '1997-03-16', 'Budha', 'O', 'malang', 'hintz.wanda@yahoo.com', '877-634-8525', '257.652.0455', 'rerum', 'Agricultural Science Technician', 'malang', 'S2', 'sapiente', 'totam', 'tidak lulus', NULL, '2019-03-05 00:20:37', '', '', '', '2018-09-05 07:20:37', '2018-09-05 00:20:37'),
(564, 'Chase Dibbert', '8', 'Laki-laki', 'Aliyaton', '1997-03-16', 'Atheis', 'B', 'bandung', 'ward.bert@jast.com', '1-888-221-7160', '1-536-202-3676', 'nulla', 'Battery Repairer', 'bandung', 'S1', 'expedita', 'fugiat', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:13', NULL),
(565, 'Anissa Funk', '873', 'Laki-laki', 'Linneaville', '1997-03-16', 'Atheis', 'A', 'padang', 'gerald.crist@hotmail.com', '(888) 954-6278', '(936) 716-2521', 'tenetur', 'Textile Dyeing Machine Operator', 'jakarta', 'S1', 'beatae', 'modi', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:13', NULL),
(567, 'Jensen Hackett', '73', 'Laki-laki', 'Beattyberg', '1997-03-16', 'Hindu', 'AB', 'payakumbuh', 'sheridan36@yahoo.com', '1-844-694-8268', '(227) 413-2541 x160', 'facilis', 'Engineering Manager', 'padang', 'S2', 'cum', 'et', 'ok', NULL, NULL, '', '', '', '2018-08-16 08:33:13', NULL),
(568, 'Cade Prohaska', '137', 'Perempuan', 'Rossview', '1997-03-16', 'Hindu', 'O', 'bandung', 'patsy27@runolfsson.org', '(866) 889-0572', '1-337-291-3872 x9469', 'illum', 'Construction Driller', 'malang', 'S2', 'et', 'ullam', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:13', NULL),
(569, 'Kattie Konopelski', '69626', 'Perempuan', 'West Mariellefort', '1997-03-16', 'Budha', 'A', 'padang', 'halvorson.payton@yahoo.com', '1-844-887-9538', '328-289-1887 x8670', 'et', 'Engraver', 'jakarta', 'S1', 'assumenda', 'dolore', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:13', NULL),
(570, 'Estell McLaughlin III', '7060', 'Perempuan', 'Abernathyview', '1997-03-16', 'Hindu', 'A', 'padang', 'albertha.fay@dickinson.biz', '1-855-401-8563', '709.856.5401 x22765', 'maiores', 'Music Composer', 'malang', 'S2', 'maiores', 'quis', 'aktif', NULL, NULL, '', '', '', '2018-08-16 08:33:13', NULL),
(571, 'Russ Nikolaus', '898', 'Laki-laki', 'Clarabelleberg', '1997-03-16', 'Budha', 'AB', 'malang', 'denesik.montana@hotmail.com', '888.434.6268', '1-618-522-7840 x3514', 'natus', 'Postsecondary Education Administrators', 'padang', 'S2', 'dolores', 'est', 'tidak lulus', NULL, '2019-03-05 00:58:56', '', '', '', '2018-09-05 07:58:56', '2018-09-05 00:58:56'),
(573, 'Prof. Jamie Tromp Jr.', '34957313', 'Perempuan', 'New Ava', '1997-03-16', 'Budha', 'A', 'jakarta', 'jayme98@abernathy.biz', '1-866-344-0919', '1-496-214-1934 x12830', 'ut', 'Biochemist or Biophysicist', 'bandung', 'S1', 'nihil', 'totam', 'aktif', NULL, NULL, '', '', '', '2018-08-16 08:33:13', NULL),
(574, 'Alessandra Hayes', '571452', 'Laki-laki', 'New Americohaven', '1997-03-16', 'Budha', 'AB', 'padang', 'hudson.javon@gmail.com', '800-525-4058', '(806) 541-9415 x953', 'molestiae', 'Offset Lithographic Press Operator', 'malang', 'SMA', 'accusantium', 'consectetur', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:13', NULL),
(575, 'Adelbert Leffler II', '1008809', 'Laki-laki', 'East Brodyland', '1997-03-16', 'Hindu', 'O', 'malang', 'lindsey21@hotmail.com', '844-345-4016', '843.651.2931 x857', 'optio', 'Admin', 'jakarta', 'S2', 'ea', 'vel', 'ok', NULL, NULL, '', '', '', '0000-00-00 00:00:00', NULL),
(577, 'Prof. Jevon Kautzer V', '47326626', 'Laki-laki', 'Lake Christellemouth', '1997-03-16', 'Atheis', 'O', 'malang', 'gene.rolfson@gmail.com', '(800) 430-0541', '595.239.7877 x80406', 'quaerat', 'Glass Blower', 'malang', 'S1', 'culpa', 'et', 'nok', NULL, NULL, '', '', '', '2018-08-16 08:33:13', NULL),
(578, 'Loy Klein IV', '381', 'Perempuan', 'Kozeyside', '1997-03-16', 'Budha', 'A', 'malang', 'gconnelly@yahoo.com', '(888) 500-5689', '720.555.8935 x0783', 'dignissimos', 'Railroad Switch Operator', 'padang', 'SMA', 'debitis', 'sint', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:13', NULL),
(579, 'Garth Jacobson', '959752183', 'Perempuan', 'Anaisville', '1997-03-16', 'Budha', 'A', 'bandung', 'turcotte.alexandrine@hotmail.com', '877-917-2330', '667-997-4889', 'consectetur', 'Food Science Technician', 'jakarta', 'S1', 'ea', 'rerum', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-21 06:05:00', '2018-08-20 23:05:00'),
(581, 'Felicia Labadie', '213164601', 'Perempuan', 'Lake Jammie', '1997-03-16', 'Hindu', 'AB', 'malang', 'walter40@yahoo.com', '1-888-216-8718', '+1-621-851-9255', 'sunt', 'Taper', 'malang', 'SMA', 'porro', 'tempora', 'ok', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(582, 'Prof. Louvenia Collins', '4672', 'Perempuan', 'North Jason', '1997-03-16', 'Hindu', 'AB', 'malang', 'kuphal.vilma@gmail.com', '844.229.6638', '389.556.1867', 'qui', 'Library Worker', 'bandung', 'S1', 'sed', 'eius', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(584, 'Stephan Funk', '190', 'Perempuan', 'Quigleybury', '1997-03-16', 'Hindu', 'O', 'malang', 'elnora59@wolff.com', '(855) 723-0673', '497-202-2576', 'voluptatem', 'Glass Cutting Machine Operator', 'malang', 'S1', 'qui', 'quam', 'ok', NULL, NULL, '', '', '', '2018-09-04 18:51:45', NULL),
(585, 'Paige Bednar', '482', 'Perempuan', 'Lake Cordieton', '1997-03-16', 'Atheis', 'O', 'jakarta', 'ondricka.daryl@yahoo.com', '800.354.6935', '408-770-4156 x820', 'vel', 'Extruding Machine Operator', 'jakarta', 'S1', 'iusto', 'exercitationem', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(586, 'Dr. Johan Hill DVM', '54', 'Perempuan', 'Lake Javierstad', '1997-03-16', 'Islam', 'AB', 'malang', 'jadyn.roberts@gmail.com', '(866) 325-4720', '+1 (902) 612-4340', 'totam', 'Political Scientist', 'padang', 'SMA', 'magnam', 'dolor', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(587, 'Anabelle Deckow', '291500579', 'Laki-laki', 'North Hannah', '1997-03-16', 'Atheis', 'AB', 'padang', 'abernathy.mireille@hotmail.com', '1-877-563-6187', '+1.524.531.8034', 'ea', 'Camera Repairer', 'malang', 'SMA', 'saepe', 'explicabo', 'aktif', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(588, 'Miss Kelsi Balistreri', '47', 'Laki-laki', 'South Pricehaven', '1997-03-16', 'Budha', 'O', 'malang', 'xbrekke@donnelly.com', '866-340-1277', '1-849-549-6741 x980', 'sit', 'Costume Attendant', 'malang', 'S1', 'sint', 'autem', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(589, 'Burdette Prohaska', '8531', 'Laki-laki', 'Lake Deshawnfort', '1997-03-16', 'Hindu', 'O', 'bandung', 'tyra.raynor@gmail.com', '(844) 762-5663', '335.426.9610', 'totam', 'Bookbinder', 'jakarta', 'SMA', 'necessitatibus', 'nihil', 'aktif', NULL, NULL, '', '', '', '2018-08-27 17:26:57', '2018-08-27 10:26:57'),
(591, 'Camden Gaylord', '1432985', 'Laki-laki', 'Sengerview', '1997-03-16', 'Budha', 'AB', 'payakumbuh', 'esta31@rutherford.com', '(866) 525-2717', '+1-650-619-8016', 'harum', 'Bridge Tender OR Lock Tender', 'malang', 'SMA', 'a', 'nihil', 'ok', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(592, 'Lina Monahan', '91054', 'Laki-laki', 'Kellibury', '1997-03-16', 'Budha', 'O', 'malang', 'ahmed04@gmail.com', '877.476.1303', '680.475.5434', 'excepturi', 'Aircraft Cargo Handling Supervisor', 'payakumbuh', 'SMA', 'et', 'et', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(593, 'Katherine Terry', '9295', 'Laki-laki', 'Reidport', '1997-03-16', 'Hindu', 'B', 'payakumbuh', 'nstamm@yahoo.com', '1-866-919-3759', '(272) 407-8276 x9286', 'laudantium', 'Construction', 'malang', 'S1', 'mollitia', 'eius', NULL, NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(594, 'Mrs. Brionna Orn III', '34586017', 'Perempuan', 'Davinshire', '1997-03-16', 'Budha', 'B', 'payakumbuh', 'yraynor@hotmail.com', '844-920-9697', '+1-882-693-8098', 'magni', 'Clinical School Psychologist', 'bandung', 'S2', 'doloribus', 'quas', 'ok', NULL, NULL, '', '', '', '2018-09-04 18:51:59', NULL),
(595, 'Ms. Alda Conn Sr.', '734', 'Laki-laki', 'New Cedrickbury', '1997-03-16', 'Hindu', 'A', 'bandung', 'twehner@hotmail.com', '888-306-7727', '252.543.0093', 'voluptatem', 'Railroad Inspector', 'malang', 'S2', 'odio', 'provident', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(596, 'Mr. Mckenzie Blanda', '5008989', 'Perempuan', 'New Delbertville', '1997-03-16', 'Hindu', 'O', 'bandung', 'dibbert.barry@davis.com', '1-844-270-8218', '+1.758.279.1512', 'sunt', 'Medical Equipment Repairer', 'payakumbuh', 'S2', 'repellat', 'dignissimos', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(597, 'Mrs. Loren Hane', '140492808', 'Perempuan', 'Hilpertview', '1997-03-16', 'Atheis', 'B', 'bandung', 'legros.dina@heaney.com', '1-888-624-6821', '(391) 694-4976 x526', 'ea', 'Record Clerk', 'malang', 'S2', 'cumque', 'sed', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(598, 'Mr. Justyn McClure I', '84533791', 'Perempuan', 'Port Dominique', '1997-03-16', 'Atheis', 'A', 'jakarta', 'taya99@bradtke.com', '(844) 796-0714', '+1-534-624-6699', 'qui', 'Bindery Worker', 'padang', 'S2', 'et', 'nihil', 'tidak lulus', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(600, 'Warren Walter', '9003', 'Perempuan', 'Rosenbaumfort', '1997-03-16', 'Islam', 'B', 'padang', 'dcorkery@hotmail.com', '(800) 964-4567', '315.324.9039', 'perferendis', 'Set Designer', 'jakarta', 'S1', 'in', 'est', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(601, 'Mrs. Brielle Bednar', '3248', 'Perempuan', 'Carterland', '1997-03-16', 'Atheis', 'B', 'payakumbuh', 'yoshiko35@gmail.com', '877.758.7484', '1-406-349-8925 x109', 'optio', 'Statistical Assistant', 'malang', 'S1', 'aspernatur', 'quibusdam', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(603, 'Frieda Greenholt', '1294144', 'Laki-laki', 'New Lindsay', '1997-03-16', 'Atheis', 'B', 'payakumbuh', 'janelle62@gutkowski.info', '800.392.2324', '639.466.6422 x464', 'quia', 'Movers', 'payakumbuh', 'S1', 'sed', 'occaecati', 'aktif', NULL, NULL, '', '', '', '2018-08-16 08:33:14', NULL),
(604, 'Dr. Johnathan Kunze MD', '4', 'Perempuan', 'Reichelland', '1997-03-16', 'Islam', 'A', 'padang', 'shaun89@gleichner.com', '866-769-4060', '(220) 265-3097', 'laborum', 'Diagnostic Medical Sonographer', 'malang', 'S1', 'corrupti', 'qui', 'ok', NULL, NULL, '', '', '', '2018-08-16 08:33:15', NULL),
(605, 'Morgan Orn V', '489926', 'Laki-laki', 'Lake Lizamouth', '1997-03-16', 'Hindu', 'B', 'payakumbuh', 'kbrekke@reichel.com', '1-844-887-1084', '282-206-2722 x44295', 'aut', 'Order Filler', 'jakarta', 'S1', 'ipsum', 'aut', 'naktif', NULL, NULL, '', '', '', '2018-08-16 08:33:15', NULL),
(606, 'Aron Weimann', '43', 'Perempuan', 'New Vestaburgh', '1997-03-16', 'Budha', 'O', 'malang', 'sibyl.torp@will.com', '844-264-9689', '1-591-627-6932', 'eveniet', 'Aircraft Body Repairer', 'bandung', 'SMA', 'blanditiis', 'provident', 'ok', NULL, NULL, '', '', '', '2018-08-16 08:33:15', NULL),
(607, 'Brice Heller', '4492236', 'Laki-laki', 'North Xzaviertown', '1997-03-16', 'Atheis', 'A', 'payakumbuh', 'uhermiston@yahoo.com', '800-551-8016', '407-348-9282', 'nostrum', 'Elementary School Teacher', 'padang', 'S2', 'unde', 'eligendi', 'ok', NULL, NULL, '', '', '', '2018-08-27 17:46:10', '2018-08-27 10:46:10'),
(608, 'Marlen Adams MD', '8475', 'Laki-laki', 'Lake Charity', '1997-03-16', 'Atheis', 'O', 'jakarta', 'kschulist@funk.biz', '800-674-0672', '1-285-700-6533 x4513', 'molestias', 'City Planning Aide', 'malang', 'SMA', 'iusto', 'numquam', 'aktif', NULL, NULL, '', '', '', '2018-08-16 08:33:15', NULL),
(611, 'Ms. Mary Barton', '69721903', 'Perempuan', 'East Christophe', '1997-03-16', 'Budha', 'B', 'payakumbuh', 'green.leonora@gmail.com', '888-404-1371', '(441) 732-9825', 'sunt', 'Anthropology Teacher', 'bandung', 'S2', 'nostrum', 'omnis', 'nok', 'kurang ini', NULL, NULL, NULL, NULL, '2018-09-05 07:19:59', '2018-09-05 00:19:59'),
(612, 'a', 'a', 'Laki-laki', 'a', '2019-10-06', 'a', 'a', 'a', 'atasan@gmail.com', '1312', '12312', 'ads', 'das', 'das', 'das', 'das', 'das', 'lulus', NULL, NULL, 'alan label.pdf', NULL, NULL, '2018-09-05 07:58:51', '2018-09-05 00:58:51'),
(613, 'a', 'aadasdasdas', 'Laki-laki', 'a', '2019-10-06', 'a', 'a', 'a', 'admaskdams@gmail.com', '1312', '12312', 'ads', 'das', 'das', 'das', 'das', 'das', 'lulus', NULL, NULL, 'kk.pdf', NULL, NULL, '2018-09-05 07:20:30', '2018-09-05 00:20:30'),
(614, 'ads', 'dasdas', 'Laki-laki', 'das', '2019-10-06', 'dasdas', 'dasd', 'das', 'adsadasd@gmail.com', '12312', '1312', 'das', 'das', 'daas', 'cscq', 'csc', 'cscsd', 'nok', 'kurang iko', NULL, NULL, NULL, NULL, '2018-09-05 07:58:12', '2018-09-05 00:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `email`, `nip`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'irus', '$2y$10$3zdUp2Z5eWPaZ0Rm1SH2Cu9HfudRP9PcQGSgy5vTPPWqvDMZDSe2a', 'irusCi4dministrasiYeah@gmail.com', '1551', 'administrasi', 'miXDJTPXkzZlfpvrrrT0JIMzzWUc2qoEXcSZGLGZy886OIZGkzWtuZoBbzSn', '2018-09-05 09:53:26', '2018-09-05 02:53:02'),
(2, 'kepala unit', '$2y$10$TeKJ2spDlbO7ZkvmzNJb4udAL2m.TaJHCXJoX.cmHjKbCnROHdIaK', 'kepala_unit@gmail.com', '1550', 'kepala_unit', 'JCJgcXP3e3bi5AUq4fdz3hsnaPyvpbkNCWvaAa1F0O98OfdANjzCk2QbAIJM', '2018-09-05 09:52:05', '2018-09-05 02:52:05'),
(3, 'tim assesment', '$2y$10$E1U3wpwxeWE3.wdqy/DPduSNv9UhxK7BmvQrX3cIj0/tKo0VEUR7i', 'tim_assesment@gmail.com', '1552', 'tim_assesment', 'nOU4w8Bh7Csv7VHXkbCzlRSi8DxiSbTnIFuQg3lJ7jMAVhTakHnHExy6S6Dg', '2018-09-05 09:53:50', '2018-09-05 02:52:21'),
(4, 'suryadaren', '$2y$10$ZFHMu76LNhgaz5jIGzY4XeNaNhr.f06P4aF85YGBQhv7kgH3ciPqq', 'suryadaren@gmail.com', '1553', 'kepala_biro', 'npZ0plze7566sEDqup0ORveGbfJSCeOYn1aYdqt1LPwFeG9jfXv4fRHpGN3X', '2018-09-05 09:14:39', '2018-09-04 07:41:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_izin`
--
ALTER TABLE `form_izin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pekerja_id` (`pekerja_id`);

--
-- Indexes for table `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_izin`
--
ALTER TABLE `form_izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pekerja`
--
ALTER TABLE `pekerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=615;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
