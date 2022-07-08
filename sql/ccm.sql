-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2022 at 09:03 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccm`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_contents`
--

CREATE TABLE `calendar_contents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `copywriting` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content_pillar_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `calendar_content_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_contents`
--

INSERT INTO `calendar_contents` (`id`, `name`, `url`, `content`, `copywriting`, `status`, `date`, `time`, `created_at`, `updated_at`, `content_pillar_id`, `team_id`, `calendar_content_category_id`) VALUES
(2, 'Membuat Todos', 'www.gamelab.id', 'asd', 'asd', 'Ongoing', '2022-07-03', '11:00:00', '2022-07-04 03:01:53', '2022-07-08 09:47:24', 1, 2, 1),
(5, 'Konten Plan', 'www.gamelab.id', 'Konten Plan merupakan konten yang sedang di rencanakan', 'Plan itu membingungkan', 'Plan', '2022-07-05', '10:22:00', '2022-07-04 03:22:55', '2022-07-04 10:22:55', 1, 1, 1),
(6, 'Konten Ongoing', 'www.gamelab.id', 'Merupakan konten yang sendang berjalan saat ini katanya si.', 'Ongoing ya semangat!', 'Ongoing', '2022-07-06', '10:23:00', '2022-07-04 03:23:43', '2022-07-04 10:23:43', 1, 1, 1),
(7, 'Konten Need Review', 'www.gamelab.id', 'Perlu direview nih kalau udah mateng perencanaannya', 'Semangat', 'Need Review', '2022-07-07', '10:24:00', '2022-07-04 03:25:46', '2022-07-04 10:25:46', 1, 1, 1),
(8, 'Konten Revisi Tanpa Revisi', 'www.gamelab.id', 'Ini kontennya ya begini', 'hehe', 'Revision', '2022-07-08', '10:25:00', '2022-07-04 03:26:30', '2022-07-04 10:30:57', 1, 1, 1),
(9, 'Konten Harus Revisi', 'www.gamelab.id', 'Ya beginilah jadi lebih baik', 'mantap', 'Revision', '2022-07-08', '10:26:00', '2022-07-04 03:27:14', '2022-07-08 14:10:48', 1, 1, 1),
(10, 'Konten Di Acc', 'www.gamelab.id', 'Akhirnya aman terselesaikan', 'Mantap test ka', 'Approved', '2022-07-09', '10:28:00', '2022-07-04 03:28:59', '2022-07-08 14:03:58', 1, 1, 1),
(11, 'Konten Terposting', 'www.gamelab.id', 'Semoga yang melihat banyak', 'Sekian', 'Published', '2022-07-12', '10:29:00', '2022-07-04 03:29:48', '2022-07-04 10:29:48', 1, 1, 1),
(12, 'Tercancel', 'www.gamelab.id', 'tidakkk', 'tercancel konten ini', 'Cancel', '2022-07-13', '10:29:00', '2022-07-04 03:30:16', '2022-07-04 10:30:16', 1, 1, 1),
(16, 'Coba Petik \'', 'www.gamelab.id', '\"\"Petik dua juga dicoba\"\"', '\'Apakah Bisa?\'', 'Need Review', '2022-07-14', '15:12:00', '2022-07-04 08:13:04', '2022-07-04 15:31:03', 1, 1, 1),
(23, 'Apa \'Petik\"\" ini?', 'www.gamelab.id', 'Mencoba di kategori lain apakah aman atau tidak, kami tidak tau + \' \' / \"\"', 'Semangat!', 'Cancel', '2022-07-04', '15:47:00', '2022-07-04 08:48:28', '2022-07-04 15:48:28', 1, 1, 2),
(24, 'Beda User', 'www.gamelab.id', 'User KA', 'Kitari', 'Plan', '2022-07-15', '11:05:00', '2022-07-06 04:05:47', '2022-07-06 11:05:47', 1, 2, 1),
(25, 'Membuat Github', 'www.gamelab.id', '', '', 'Plan', '2022-07-07', '11:40:00', '2022-07-07 04:40:32', '2022-07-07 11:40:32', 3, 2, 1),
(26, 'Tutorial Satu Menit Github', 'www.tiktok.com', 'Bebas', 'Pokoknya kontennya lebih bagus', 'Plan', '2022-07-11', '15:45:00', '2022-07-07 08:50:00', '2022-07-07 15:50:00', 2, 2, 5),
(28, 'teredit k-a', 'www.gamelab.id', 'edit ka', 'edit ka', 'Revision', '2022-07-08', '09:57:00', '2022-07-08 02:57:52', '2022-07-08 14:10:20', 1, 5, 1),
(29, 'konten k-ardliyan edit', '', 'admin', 'admin', 'Approved', '2022-07-02', '10:46:00', '2022-07-08 03:46:47', '2022-07-08 14:02:19', 1, 2, 1),
(30, 'teredit admin', '', '', '', 'Revision', '2022-07-10', '10:50:00', '2022-07-08 03:51:03', '2022-07-08 16:00:12', 1, 2, 1),
(31, 'mencoba baru', '', '', '', 'Plan', '2022-07-08', '14:23:00', '2022-07-08 07:23:06', '2022-07-08 14:23:06', 1, 2, 1),
(35, '123', '', '', '', 'Revision', '2022-07-08', '14:26:00', '2022-07-08 07:26:35', '2022-07-08 14:26:49', 1, 2, 1),
(36, 'Membuat Github ', '', '', '', 'Revision', '2022-07-16', '14:27:00', '2022-07-08 07:27:21', '2022-07-08 14:27:21', 1, 2, 1),
(37, 'Revisi', 'www.gamelab.id', 'Aman', '', 'Revision', '2022-07-17', '14:30:00', '2022-07-08 07:31:06', '2022-07-08 14:31:06', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `calendar_content_categories`
--

CREATE TABLE `calendar_content_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_content_categories`
--

INSERT INTO `calendar_content_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', '2022-07-01 06:14:43', '2022-07-01 13:14:43'),
(2, 'Twitter', '2022-07-04 02:14:20', '2022-07-04 09:14:20'),
(5, 'Tiktok', '2022-07-07 08:09:12', '2022-07-07 15:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_content_revisions`
--

CREATE TABLE `calendar_content_revisions` (
  `id` int(11) NOT NULL,
  `revision` text NOT NULL,
  `calendar_content_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_content_revisions`
--

INSERT INTO `calendar_content_revisions` (`id`, `revision`, `calendar_content_id`, `team_id`) VALUES
(1, 'test revision', 28, 2),
(4, 'Ini merupakan Catatan untuk nantinya memberi tau revisi apa yang diperlukan untuk konten yang lebih baik lagi, anjas coba', 9, 2),
(7, 'teredit oleh admin ', 30, 1),
(8, 'testing', 35, 2),
(16, 'menambahkan revisi', 37, 2);

-- --------------------------------------------------------

--
-- Table structure for table `content_pillars`
--

CREATE TABLE `content_pillars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_pillars`
--

INSERT INTO `content_pillars` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'News', '2022-07-01 06:15:26', '2022-07-01 13:15:26'),
(2, 'Sharing', '2022-07-01 06:43:37', '2022-07-01 13:43:37'),
(3, 'Webinar', '2022-07-07 04:40:18', '2022-07-07 11:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `password`, `email`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Gamelab', '21232f297a57a5a743894a0e4a801fc3', 'admin@gamelab.id', 1, '2022-07-01 04:35:45', '2022-07-06 10:37:06'),
(2, 'k-ardliyan', '202cb962ac59075b964b07152d234b70', 'k.ardliyan@gmail.com', 2, '2022-07-06 04:03:33', '2022-07-08 09:20:22'),
(5, 'capten', '202cb962ac59075b964b07152d234b70', 'captenolleng@gmail.com', 3, '2022-07-06 07:10:58', '2022-07-06 14:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `team_roles`
--

CREATE TABLE `team_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_roles`
--

INSERT INTO `team_roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'reviewer'),
(3, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar_contents`
--
ALTER TABLE `calendar_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_pillar_id` (`content_pillar_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `calendar_content_category_id` (`calendar_content_category_id`);

--
-- Indexes for table `calendar_content_categories`
--
ALTER TABLE `calendar_content_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_content_revisions`
--
ALTER TABLE `calendar_content_revisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `calendar_content_id` (`calendar_content_id`),
  ADD KEY `team_id` (`team_id`) USING BTREE;

--
-- Indexes for table `content_pillars`
--
ALTER TABLE `content_pillars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `team_roles`
--
ALTER TABLE `team_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_contents`
--
ALTER TABLE `calendar_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `calendar_content_categories`
--
ALTER TABLE `calendar_content_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `calendar_content_revisions`
--
ALTER TABLE `calendar_content_revisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `content_pillars`
--
ALTER TABLE `content_pillars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team_roles`
--
ALTER TABLE `team_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendar_contents`
--
ALTER TABLE `calendar_contents`
  ADD CONSTRAINT `calendar_contents_ibfk_1` FOREIGN KEY (`content_pillar_id`) REFERENCES `content_pillars` (`id`),
  ADD CONSTRAINT `calendar_contents_ibfk_2` FOREIGN KEY (`calendar_content_category_id`) REFERENCES `calendar_content_categories` (`id`),
  ADD CONSTRAINT `calendar_contents_ibfk_3` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `calendar_content_revisions`
--
ALTER TABLE `calendar_content_revisions`
  ADD CONSTRAINT `calendar_content_revisions_ibfk_1` FOREIGN KEY (`calendar_content_id`) REFERENCES `calendar_contents` (`id`),
  ADD CONSTRAINT `calendar_content_revisions_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `team_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
