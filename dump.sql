-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 24, 2023 at 03:45 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbname2`
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
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modification_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `priority` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `type`, `subject`, `ticket_text`, `state`, `creation_date`, `modification_date`, `user_id`, `priority`) VALUES
(1, 1, 'test subject', 'test message', 1, '2023-06-22 12:48:16', '2023-06-22 12:48:16', 6, 1),
(2, 2, 'No funciona internet', 'Pues eso, que no funciona internet, nada.', 1, '2023-06-23 12:29:17', '2023-06-23 12:29:17', 8, 3),
(3, 3, 'No funciona la impresora', 'No impresora no funciona no hace nada', 1, '2023-06-23 13:14:53', '2023-06-24 15:38:38', 8, 2),
(4, 4, 'no recibo emails', 'eso', 1, '2023-06-23 13:22:56', '2023-06-23 13:22:56', 8, 4),
(5, 5, 'asdfasdfasdf', 'asdfasdfasdfasdfasdfasdf', 1, '2023-06-23 13:26:34', '2023-06-24 15:41:13', 8, 2),
(6, 5, 'No funciona el microfono', 'No se me escucha', 1, '2023-06-24 06:40:38', '2023-06-24 06:40:38', 8, 2),
(7, 6, 'no abre office', 'word no funciona, no se abre o tarda muchísimo en abrir', 1, '2023-06-24 06:59:55', '2023-06-24 06:59:55', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tickets_priority`
--

CREATE TABLE `tickets_priority` (
  `id` int NOT NULL,
  `priority_name` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tickets_priority`
--

INSERT INTO `tickets_priority` (`id`, `priority_name`) VALUES
(1, 'Normal'),
(2, 'Low'),
(3, 'High'),
(4, 'Urgent');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_responses`
--

CREATE TABLE `tickets_responses` (
  `id` int NOT NULL,
  `message` text COLLATE utf32_unicode_ci NOT NULL,
  `message_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticket_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tickets_responses`
--

INSERT INTO `tickets_responses` (`id`, `message`, `message_date`, `ticket_id`, `user_id`) VALUES
(15, 'asdfasdfasdf', '2023-06-24 09:55:42', 1, 7),
(16, 'sadfasdfasdfasdfasdfasdf', '2023-06-24 09:55:48', 1, 7),
(17, 'sadfasdfasdfasdfasdfasdf', '2023-06-24 09:55:50', 1, 7),
(18, 'sadfasdfasdfasdfasdfasdf', '2023-06-24 09:55:59', 1, 7),
(19, 'sadfasdfasdfasdfasdfasdf', '2023-06-24 09:55:59', 1, 7),
(20, 'sadfasdfasdfasdfasdfasdf', '2023-06-24 09:55:59', 1, 7),
(21, 'sadfasdfasdfasdfasdfasdf', '2023-06-24 09:56:00', 1, 7),
(22, 'sadfasdfasdfasdfasdfasdf', '2023-06-24 09:56:00', 1, 7),
(23, 'sadfasdfasdfasdfasdfasdf', '2023-06-24 09:56:00', 1, 7),
(24, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-06-24 09:56:08', 1, 7),
(25, 'asdfaasdfasdfasdfasdf', '2023-06-24 09:56:29', 1, 7),
(26, 'sadfasdfasdf', '2023-06-24 09:56:39', 2, 7),
(27, 'asdfasdfasdf', '2023-06-24 09:56:42', 2, 7),
(28, 'asfdasdfasdfasfasdf', '2023-06-24 09:56:46', 2, 7),
(29, 'asdfasdfasdf', '2023-06-24 09:57:01', 2, 7),
(30, 'asdfasdfasdf', '2023-06-24 09:58:50', 2, 8),
(31, 'sadfasdfasdfasdfasdf', '2023-06-24 14:53:33', 2, 7),
(32, 'cartucho cambiado', '2023-06-24 15:32:48', 3, 7),
(33, 'test', '2023-06-24 15:33:50', 3, 7),
(34, 'asdfasdfasdfasdf', '2023-06-24 15:34:37', 3, 7),
(35, 'asdfasdfasdf', '2023-06-24 15:34:48', 3, 7),
(36, 'asdfasdfasdfasdf', '2023-06-24 15:37:35', 3, 7),
(37, 'asdfasdfasdfasdf', '2023-06-24 15:38:00', 3, 7),
(38, 'asdfasdfasdfasdf', '2023-06-24 15:38:38', 3, 7),
(39, 'adsfgasdfgasdf', '2023-06-24 15:41:13', 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tickets_state`
--

CREATE TABLE `tickets_state` (
  `id` int NOT NULL,
  `ticket_state` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `ticket_state_label` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tickets_state`
--

INSERT INTO `tickets_state` (`id`, `ticket_state`, `ticket_state_label`) VALUES
(1, 'todo', 'ToDo'),
(2, 'wip', 'Work In Progress'),
(3, 'done', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_type`
--

CREATE TABLE `tickets_type` (
  `id` int NOT NULL,
  `type` varchar(40) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `label` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tickets_type`
--

INSERT INTO `tickets_type` (`id`, `type`, `label`) VALUES
(1, 'Passwords', 'Forgotten password'),
(2, 'Network issues', 'Network and/or wifi issues '),
(3, 'Printer', 'Jammed printer'),
(4, 'Email', 'Email problem'),
(5, 'Hardware', 'Hardware slow or faulty, keyboard or mouse problems'),
(6, 'Software', 'Frozen screen, sound, mic...'),
(7, 'Spam / Virus', 'Spam, malware, virus, phising, etc');

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `register_date`, `role`) VALUES
(6, 'pedro@pedro.com', '$2y$10$VlqDXt6XFUQJ/eVQubgrqewX/jznnvXdb5uGaRvLWR2aGpNQ./U7i', 'Pedro3', 'Pedro3', '2023-06-21 12:35:32', 2),
(7, 'admin@admin.com', '$2y$10$ros5duRJPgTTGdbl54ig3.cv./UPypnSU8GNJnuCxJK6tGgPEgQaS', 'Admin', 'Dios', '2023-06-23 11:33:18', 1),
(8, 'user@user.com', '$2y$10$sMz0QO75aj90kWuag3907ObQbFqCapJzjLb1g2RXpO3Drp8dc08sm', 'user', 'user', '2023-06-23 12:16:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` tinyint(1) NOT NULL,
  `role` varchar(15) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tickets_priority`
--
ALTER TABLE `tickets_priority`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets_responses`
--
ALTER TABLE `tickets_responses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tickets_state`
--
ALTER TABLE `tickets_state`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets_type`
--
ALTER TABLE `tickets_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- Constraints for table `tickets_responses`
--
ALTER TABLE `tickets_responses`
  ADD CONSTRAINT `tickets_responses_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_responses_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `users_roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
