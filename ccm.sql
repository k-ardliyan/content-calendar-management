-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2022 at 08:43 AM
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
  `revision` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content_pillar_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `calendar_content_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_contents`
--

INSERT INTO `calendar_contents` (`id`, `name`, `url`, `content`, `copywriting`, `status`, `date`, `time`, `revision`, `created_at`, `updated_at`, `content_pillar_id`, `team_id`, `calendar_content_category_id`) VALUES
(1, 'bootcamp', '', 'content', 'copy', 'Plan', '2022-06-25', '15:00:00', '', '2022-06-21 04:22:08', '2022-06-21 14:28:44', 1, 1, 1),
(2, 'berkarir', '', 'berkarir itu mudah', 'berkarir itu mudah menggunakan copywriting', 'Ongoing', '2022-06-24', '09:34:22', '', '2022-06-21 04:22:08', '2022-06-21 11:22:08', 2, 1, 2),
(3, 'Kelas Industri', '', 'Iya beginilah konten dari kelas industri belum tau isinya seperti apa yang penting banyaklah ya hehe', 'Copywriting di sini merupakan konten yang menarik dari untuk dibaca para pembaca pastinya agar tertarik dengan konten yang dibuat', 'Need Review', '2022-06-21', '11:25:00', '', '2022-06-21 04:26:23', '2022-06-21 11:26:53', 2, 1, 2);

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
(1, 'Facebook', '2022-06-21 04:21:22', '2022-06-21 11:21:22'),
(2, 'Instagram', '2022-06-21 04:21:29', '2022-06-21 11:21:29'),
(3, '', '2022-06-21 08:18:58', '2022-06-21 15:18:58'),
(4, 'Tiktok', '2022-06-21 08:21:20', '2022-06-21 15:21:20'),
(5, 'Web', '2022-06-21 08:28:06', '2022-06-21 15:28:06'),
(6, '', '2022-06-21 08:28:14', '2022-06-21 15:28:14');

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
(1, 'News', '2022-06-21 04:21:00', '2022-06-21 11:21:00'),
(2, 'Meme', '2022-06-21 04:21:13', '2022-06-21 11:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'k-ardliyan', '2022-06-14 06:29:02', '2022-06-14 13:29:02');

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
-- Indexes for table `content_pillars`
--
ALTER TABLE `content_pillars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_contents`
--
ALTER TABLE `calendar_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calendar_content_categories`
--
ALTER TABLE `calendar_content_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `content_pillars`
--
ALTER TABLE `content_pillars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
