-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2022 at 09:03 AM
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
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `content_pillar_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `calendar_content_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_contents`
--

INSERT INTO `calendar_contents` (`id`, `name`, `url`, `content`, `copywriting`, `status`, `date`, `time`, `revision`, `created_at`, `updated_at`, `content_pillar_id`, `team_id`, `calendar_content_category_id`) VALUES
(1, 'boocamp', '', 'content', 'copy', 'plan', '2022-06-21', '15:49:47', '', '2022-06-20 08:50:17', '2022-06-20 08:50:17', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `calendar_content_categories`
--

CREATE TABLE `calendar_content_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_content_categories`
--

INSERT INTO `calendar_content_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'facebook', '2022-06-20 08:49:43', '2022-06-20 08:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `content_pillars`
--

CREATE TABLE `content_pillars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_pillars`
--

INSERT INTO `content_pillars` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'news', '2022-06-20 08:49:35', '2022-06-20 08:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'k-ardliyan', '2022-06-14 06:29:02', '2022-06-14 06:29:02');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calendar_content_categories`
--
ALTER TABLE `calendar_content_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content_pillars`
--
ALTER TABLE `content_pillars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
