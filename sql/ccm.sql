-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2022 at 05:36 PM
-- Server version: 8.0.28
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
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `copywriting` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content_pillar_id` int NOT NULL,
  `team_id` int NOT NULL,
  `calendar_content_category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_contents`
--

INSERT INTO `calendar_contents` (`id`, `name`, `url`, `content`, `copywriting`, `status`, `date`, `time`, `created_at`, `updated_at`, `content_pillar_id`, `team_id`, `calendar_content_category_id`) VALUES
(7, 'Konten Need Review', 'www.gamelab.id', 'Perlu direview nih kalau udah mateng perencanaannya', 'Semangat', 'Need Review', '2022-07-07', '10:24:00', '2022-07-04 03:25:46', '2022-07-04 10:25:46', 1, 1, 1),
(8, 'Konten Revisi Tanpa Revisi', 'www.gamelab.id', 'Ini kontennya ya begini', 'hehe', 'Revision', '2022-07-08', '10:25:00', '2022-07-04 03:26:30', '2022-07-04 10:30:57', 1, 1, 1),
(9, 'Konten Harus Revisi', 'www.gamelab.id', 'Ya beginilah jadi lebih baik\n\ntest\n\ntest', 'mantap', 'Revision', '2022-07-08', '10:26:00', '2022-07-04 03:27:14', '2022-07-12 00:07:41', 1, 1, 1),
(10, 'Konten Di Acc', 'www.gamelab.id', 'Akhirnya aman terselesaikan', 'Mantap test ka', 'Approved', '2022-07-09', '10:28:00', '2022-07-04 03:28:59', '2022-07-08 14:03:58', 1, 1, 1),
(11, 'Konten Terposting', 'www.gamelab.id', 'Semoga yang melihat banyak', 'Sekian', 'Revision', '2022-07-12', '10:29:00', '2022-07-04 03:29:48', '2022-07-11 23:50:16', 1, 1, 1),
(12, 'Tercancel', 'www.gamelab.id', 'tidakkk', 'tercancel konten ini', 'Cancel', '2022-07-13', '00:00:00', '2022-07-04 03:30:16', '2022-07-12 00:27:45', 1, 1, 1),
(16, 'Coba Petik \'\'', 'www.gamelab.id', '\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"Petik dua juga dicoba\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"', '\'\'Apakah Bisa?\'\'', 'Revision', '2022-07-14', '15:12:00', '2022-07-04 08:13:04', '2022-07-11 23:49:36', 1, 1, 1),
(23, 'Apa \'Petik\"\" ini?', 'www.gamelab.id', 'Mencoba di kategori lain apakah aman atau tidak, kami tidak tau + \' \' / \"\"', 'Semangat!', 'Cancel', '2022-07-04', '15:47:00', '2022-07-04 08:48:28', '2022-07-04 15:48:28', 1, 1, 2),
(25, 'Membuat Github', 'www.gamelab.id', '', '', 'Plan', '2022-07-07', '11:40:00', '2022-07-07 04:40:32', '2022-07-07 11:40:32', 3, 2, 1),
(26, 'Tutorial Satu Menit Github', 'www.tiktok.com', 'Bebas', 'Pokoknya kontennya lebih bagus', 'Plan', '2022-07-11', '15:45:00', '2022-07-07 08:50:00', '2022-07-07 15:50:00', 2, 2, 5),
(52, 'Konten Plan', '', '', '', 'Plan', '2022-07-05', '00:14:00', '2022-07-11 17:14:45', '2022-07-12 00:14:45', 1, 2, 1),
(53, 'Konten Ongoing', '', '', '', 'Ongoing', '2022-07-12', '01:01:00', '2022-07-11 18:01:59', '2022-07-12 01:01:59', 1, 2, 1),
(54, 'Konten Published', '', '', '', 'Published', '2022-07-15', '01:02:00', '2022-07-11 18:02:17', '2022-07-12 01:02:17', 1, 2, 1),
(55, 'Test Publish 1', '', '', '', 'Published', '2022-05-23', '00:28:00', '2022-07-12 17:29:11', '2022-05-23 00:29:11', 1, 2, 1),
(56, 'Test Publish 2', '', '', '', 'Published', '2022-05-24', '00:29:00', '2022-07-12 17:29:23', '2022-05-24 00:29:23', 1, 2, 1),
(57, 'Test Publish 3', '', '', '', 'Published', '2022-05-13', '00:29:00', '2022-07-12 17:29:40', '2022-05-13 00:29:40', 1, 2, 1),
(58, 'Test Publish 4', '', '', '', 'Published', '2022-06-06', '00:29:00', '2022-07-12 17:29:54', '2022-06-06 00:29:54', 1, 2, 1),
(59, 'Test Publish 5', '', '', '', 'Published', '2022-06-07', '00:29:00', '2022-07-12 17:30:04', '2022-06-14 00:30:04', 1, 2, 1),
(60, 'Test Publish 5', '', '', '', 'Published', '2022-07-13', '00:31:00', '2022-07-12 17:31:41', '2022-07-13 00:31:41', 1, 2, 1),
(61, 'Test Publish 6', '', '', '', 'Published', '2022-07-11', '00:31:00', '2022-07-12 17:32:00', '2022-07-11 00:33:07', 1, 2, 1),
(62, 'Test Publish 7', '', '', '', 'Published', '2022-07-11', '00:32:00', '2022-07-12 17:32:09', '2022-07-11 00:33:07', 1, 2, 1),
(63, 'Test Publish 8', '', '', '', 'Published', '2022-07-13', '00:34:00', '2022-07-12 17:34:06', '2022-07-13 00:34:06', 1, 1, 1),
(64, 'Test Publish 9', '', '', '', 'Published', '2022-07-13', '00:34:00', '2022-07-12 17:34:36', '2022-07-13 00:34:36', 1, 6, 1),
(65, 'Test Publish 10', '', '', '', 'Published', '2022-04-13', '00:35:00', '2022-07-12 17:35:53', '2022-04-13 00:35:53', 1, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `calendar_content_categories`
--

CREATE TABLE `calendar_content_categories` (
  `id` int NOT NULL,
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
  `id` int NOT NULL,
  `revision` text NOT NULL,
  `calendar_content_id` int NOT NULL,
  `team_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_content_revisions`
--

INSERT INTO `calendar_content_revisions` (`id`, `revision`, `calendar_content_id`, `team_id`, `created_at`, `updated_at`) VALUES
(4, 'Ini merupakan Catatan untuk nantinya memberi tau revisi apa yang diperlukan untuk konten yang lebih baik lagi\nRevisi terbaru jam baru', 9, 2, '2022-07-11 16:27:24', '2022-07-12 00:08:00'),
(18, 'Mencoba review by ka', 16, 2, '2022-07-11 16:27:24', '2022-07-11 23:27:24'),
(21, '', 7, 2, '2022-07-11 16:27:24', '2022-07-11 23:27:24'),
(22, 'test revisiii', 11, 2, '2022-07-11 16:50:16', '2022-07-12 00:30:05'),
(23, '', 12, 2, '2022-07-11 17:27:38', '2022-07-12 00:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `content_pillars`
--

CREATE TABLE `content_pillars` (
  `id` int NOT NULL,
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
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `password`, `email`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Gamelab', '21232f297a57a5a743894a0e4a801fc3', 'admin@gamelab.id', 1, '2022-07-01 04:35:45', '2022-07-06 10:37:06'),
(2, 'k-ardliyan', '202cb962ac59075b964b07152d234b70', 'k.ardliyan@gmail.com', 2, '2022-07-06 04:03:33', '2022-07-08 09:20:22'),
(5, 'capten', '202cb962ac59075b964b07152d234b70', 'captenolleng@gmail.com', 3, '2022-07-06 07:10:58', '2022-07-06 14:10:58'),
(6, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 3, '2022-07-08 09:31:02', '2022-07-13 00:35:03'),
(7, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user2@gmail.com', 3, '2022-07-08 21:28:31', '2022-07-13 00:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `team_roles`
--

CREATE TABLE `team_roles` (
  `id` int NOT NULL,
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `calendar_content_categories`
--
ALTER TABLE `calendar_content_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `calendar_content_revisions`
--
ALTER TABLE `calendar_content_revisions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `content_pillars`
--
ALTER TABLE `content_pillars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_roles`
--
ALTER TABLE `team_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `calendar_content_revisions_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `calendar_content_revisions_ibfk_3` FOREIGN KEY (`calendar_content_id`) REFERENCES `calendar_contents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `team_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
