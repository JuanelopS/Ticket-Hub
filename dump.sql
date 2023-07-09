-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 09, 2023 at 08:52 AM
-- Server version: 8.0.33
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbname`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int NOT NULL,
  `type` int NOT NULL,
  `subject` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `ticket_text` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `state` int NOT NULL DEFAULT '1',
  `creation_date` datetime NOT NULL,
  `modification_date` datetime NOT NULL,
  `user_id` int NOT NULL,
  `priority` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_priority`
--

CREATE TABLE `tickets_priority` (
  `id` int NOT NULL,
  `priority_name` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_responses`
--

CREATE TABLE `tickets_responses` (
  `id` int NOT NULL,
  `message` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `message_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticket_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_state`
--

CREATE TABLE `tickets_state` (
  `id` int NOT NULL,
  `ticket_state` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `ticket_state_label` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_type`
--

CREATE TABLE `tickets_type` (
  `id` int NOT NULL,
  `type` varchar(40) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `label` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `name` varchar(128) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `surname` varchar(128) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` tinyint(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` tinyint(1) NOT NULL,
  `role` varchar(15) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ticket_type` (`type`),
  ADD KEY `priority` (`priority`),
  ADD KEY `state` (`state`);

--
-- Indexes for table `tickets_priority`
--
ALTER TABLE `tickets_priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_responses`
--
ALTER TABLE `tickets_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tickets_state`
--
ALTER TABLE `tickets_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_type`
--
ALTER TABLE `tickets_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`role`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_priority`
--
ALTER TABLE `tickets_priority`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_responses`
--
ALTER TABLE `tickets_responses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_state`
--
ALTER TABLE `tickets_state`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_type`
--
ALTER TABLE `tickets_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`type`) REFERENCES `tickets_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`priority`) REFERENCES `tickets_priority` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`state`) REFERENCES `tickets_state` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tickets_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
