-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2025 at 09:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemdisposisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval_checker`
--

CREATE TABLE `approval_checker` (
  `id` int NOT NULL,
  `id_dok` int NOT NULL,
  `approval` int NOT NULL,
  `status_approval` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approval_checker`
--

INSERT INTO `approval_checker` (`id`, `id_dok`, `approval`, `status_approval`, `keterangan`, `tanggal`) VALUES
(20, 56, 1, 3, 'ditolak', '2025-11-10 15:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `approval_signer`
--

CREATE TABLE `approval_signer` (
  `id` int NOT NULL,
  `id_dok` int NOT NULL,
  `id_karyawan` int NOT NULL,
  `status_approval` int NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_dept` int NOT NULL,
  `nama_dept` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_dept`, `nama_dept`, `is_active`) VALUES
(1, 'A', 1),
(2, 'B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int NOT NULL,
  `kode_pengajuan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_karyawan` int NOT NULL,
  `tanggal_input` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_jenis_dokumen` int NOT NULL,
  `kepada` int NOT NULL,
  `isi_dokumen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lampiran` int NOT NULL,
  `perihal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `checker` int NOT NULL,
  `signer` int NOT NULL,
  `status` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `kode_pengajuan`, `id_karyawan`, `tanggal_input`, `id_jenis_dokumen`, `kepada`, `isi_dokumen`, `lampiran`, `perihal`, `checker`, `signer`, `status`, `keterangan`) VALUES
(27, '', 1, '2025-10-06 11:47:30', 2, 1, '<div>\r\n<h2 style=\"font-style:italic; text-align:center\"><span style=\"font-family:Comic Sans MS,cursive\"><span style=\"font-size:24px\">Lorem Ipsum</span></span></h2>\r\n\r\n<h4 style=\"text-align:justify\"><span class=\"marker\">&quot;Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...&quot;</span></h4>\r\n\r\n<h5 style=\"text-align:justify\"><span class=\"marker\">&quot;There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...&quot;</span></h5>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\"><strong>No</strong></td>\r\n			<td style=\"text-align:center\"><strong>Nama</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>kjdfhkjbasdkjfsdjkf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2</td>\r\n			<td>sdfkjshfbdsv sdjvbsdb sdkkdssdkbsdfkd djdfjkhf as</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<hr />\r\n<h2 style=\"text-align:justify\">What is Lorem Ipsum?</h2>\r\n\r\n<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2 style=\"text-align:justify\">Why do we use it?</h2>\r\n\r\n<p style=\"text-align:justify\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\">Where does it come from?</h2>\r\n\r\n<p style=\"text-align:justify\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p style=\"text-align:justify\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2 style=\"text-align:justify\">Where can I get some?</h2>\r\n\r\n<p style=\"text-align:justify\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</p>\r\n</div>\r\n', 0, 'lorem lipsum', 1, 2, 2, ''),
(29, '', 1, '2025-10-10 15:31:50', 1, 1, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\">no</td>\r\n			<td style=\"text-align:center\">Nama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>233wsda</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2</td>\r\n			<td>fdfsklfjlfs</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 'tes buat data approval', 2, 2, 1, ''),
(30, '', 1, '2025-10-06 11:45:11', 1, 2, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>no</td>\r\n			<td>nama</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>queeen</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2</td>\r\n			<td>namaku</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>saya</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 'update', 2, 1, 3, ''),
(39, '', 1, '2025-10-10 11:26:06', 1, 1, '<p>ds</p>\r\n', 0, 'update', 1, 1, 3, ''),
(41, '', 1, '2025-10-10 14:26:58', 1, 1, '<p>ds</p>\r\n', 0, 'update', 1, 2, 1, ''),
(49, '', 1, '2025-10-13 15:43:27', 1, 1, '<p>triger</p>\r\n', 0, 'triger', 1, 2, 1, ''),
(56, '', 1, '2025-10-13 15:58:16', 1, 1, '<p>triger</p>\r\n', 0, 'triger', 1, 2, 3, '');

--
-- Triggers `dokumen`
--
DELIMITER $$
CREATE TRIGGER `insert_approval` AFTER INSERT ON `dokumen` FOR EACH ROW INSERT INTO approval(id_dok, checker, status_checker, keterangan_checker) VALUES(new.id_dokumen, new.checker, 1,'')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int NOT NULL,
  `nama_karyawan` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` int NOT NULL,
  `role_id` int NOT NULL,
  `departemen` int NOT NULL,
  `date_created` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `email`, `password`, `is_active`, `role_id`, `departemen`, `date_created`) VALUES
(1, 'Bambang adi saputra', 'bambang@bankmandiri.com', '1234', 1, 1, 1, ''),
(2, 'wahyu adi putra', 'wahyu@gmail.com', '1234', 1, 12, 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval_checker`
--
ALTER TABLE `approval_checker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approval_signer`
--
ALTER TABLE `approval_signer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval_checker`
--
ALTER TABLE `approval_checker`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `approval_signer`
--
ALTER TABLE `approval_signer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_dept` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
