-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 08, 2023 at 06:37 PM
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

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `type`, `subject`, `ticket_text`, `state`, `creation_date`, `modification_date`, `user_id`, `priority`) VALUES
(1, 1, 'test subject', 'test message', 2, '2023-06-22 12:48:16', '2023-07-07 23:56:08', 6, 1),
(2, 2, 'No funciona internet', 'Pues eso, que no funciona internet, nada.', 3, '2023-06-23 12:29:17', '2023-07-08 18:29:20', 8, 3),
(3, 3, 'No funciona la impresora', 'No impresora no funciona no hace nada', 1, '2023-06-23 13:14:53', '2023-06-24 15:38:38', 8, 2),
(4, 4, 'no recibo emails', 'eso', 2, '2023-06-23 13:22:56', '2023-06-26 17:11:07', 8, 4),
(5, 5, 'asdfasdfasdf', 'asdfasdfasdfasdfasdfasdf', 1, '2023-06-23 13:26:34', '2023-07-08 20:20:39', 8, 2),
(6, 5, 'No funciona el microfono', 'No se me escucha', 1, '2023-06-24 06:40:38', '2023-06-24 06:40:38', 8, 2),
(7, 6, 'no abre office', 'word no funciona, no se abre o tarda muchísimo en abrir', 2, '2023-06-24 06:59:55', '2023-07-08 17:23:55', 8, 2),
(8, 3, 'eargsafg', 'dsflkgjsdfg', 1, '2023-06-26 19:13:50', '2023-06-26 19:13:50', 12, 2),
(9, 6, 'sadlkfjfl', 'isajdfilaskdjfsdf', 1, '2023-06-26 19:14:28', '2023-06-26 19:14:28', 12, 4),
(10, 2, 'dfgdfg', 'zvdsffdsf', 1, '2023-06-26 19:18:00', '2023-06-26 19:18:00', 12, 4),
(11, 4, '4444444444', 'lksjdf', 1, '2023-06-26 19:18:37', '2023-06-26 19:18:37', 12, 1),
(12, 5, 'dfagljk', '98798y', 1, '2023-06-26 19:19:01', '2023-06-26 17:20:17', 12, 3),
(13, 1, '989898', '989898989', 1, '2023-07-08 14:36:57', '2023-07-08 16:19:09', 13, 2),
(14, 2, '565656', '565656565656', 1, '2023-07-08 14:38:50', '2023-07-08 16:19:18', 13, 3);

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
  `message` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
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
(39, 'adsfgasdfgasdf', '2023-06-24 15:41:13', 5, 7),
(40, 'sdlkfjsadlkfjsdkaf\n', '2023-06-26 17:10:03', 1, 11),
(41, 'kugukgkgjjk', '2023-06-26 17:20:17', 12, 11),
(42, 'prueba', '2023-06-26 19:38:29', 12, 11),
(43, 'see hour', '2023-06-26 19:38:54', 12, 11),
(44, 'askidfhjkasdf', '2023-06-26 19:40:03', 12, 11),
(45, 'bhjbhjbhjbhj', '2023-06-26 19:40:15', 12, 11),
(46, 'kjbkjb', '2023-06-26 19:55:01', 1, 11),
(47, 'aasdfasdfdsf', '2023-07-07 23:36:03', 9, 11),
(48, 'SADFGADGFADSG', '2023-07-07 23:38:27', 7, 11),
(49, 'response', '2023-07-08 14:57:19', 14, 13),
(50, 'response 2', '2023-07-08 14:59:07', 14, 13),
(51, '39uwehiofwhe', '2023-07-08 15:02:28', 14, 13),
(52, 'asdfasdfasdf', '2023-07-08 15:45:30', 14, 13),
(53, 'asdfsdasd', '2023-07-08 15:46:44', 14, 13),
(54, 'sadfasdfsdf', '2023-07-08 15:49:35', 14, 13),
(55, 'sadfasdfsdf', '2023-07-08 15:50:11', 14, 13),
(56, 'safdasdf', '2023-07-08 15:50:22', 14, 13),
(57, 'sadfsadfd', '2023-07-08 15:51:12', 14, 13),
(58, 'sadfsadfd', '2023-07-08 15:51:26', 14, 13),
(59, 'zascfSFDSD', '2023-07-08 15:51:35', 14, 13),
(60, 'zascfSFDSD', '2023-07-08 15:51:57', 14, 13),
(61, 'zdfgvafdgadsgfsd', '2023-07-08 15:52:05', 14, 13),
(62, '<sdfsadfsadfsa', '2023-07-08 15:53:52', 14, 13),
(63, 'sdFASDFASDF', '2023-07-08 15:55:14', 14, 13),
(64, '<svfasdfasdfasdf', '2023-07-08 16:00:04', 14, 13),
(65, 'dasfgsafsd', '2023-07-08 16:05:52', 13, 13),
(66, 'dasfgsafsd', '2023-07-08 16:05:53', 13, 13),
(67, '<asdasdsad\n', '2023-07-08 16:08:07', 13, 13),
(68, '<asdasdsad\n', '2023-07-08 16:08:28', 13, 13),
(69, 'asdfasdfsdasdf', '2023-07-08 16:12:58', 13, 13),
(70, 'safgqfasd', '2023-07-08 16:16:04', 14, 13),
(71, '<sfsdfasdfsdafsdf', '2023-07-08 16:19:09', 13, 13),
(72, 'SDFWQEFRQER443QR5', '2023-07-08 16:19:18', 14, 13),
(73, 'aergetaert', '2023-07-08 16:52:51', 2, 11),
(74, 'asdfadsf', '2023-07-08 17:23:55', 7, 11);

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
(8, 'user@user.com', '$2y$10$sMz0QO75aj90kWuag3907ObQbFqCapJzjLb1g2RXpO3Drp8dc08sm', 'user', 'user', '2023-06-23 12:16:47', 2),
(11, 'admin@admin.com', '$2y$10$w463DTDONfJErs3q5ajtPOrMkDKqo6CG6apPPL5RO4KypghDIq7by', 'Admin', 'admin', '2023-06-26 17:09:14', 1),
(12, 'jose@jose.com', '$2y$10$ZjeFQsLjG2yocQNQ2Y/J..oSyFEL2OuZgOG.fPlvB8ZFEihvJSiW.', 'jose', 'jose', '2023-06-26 17:11:32', 2),
(13, 'user@user.com', '$2y$10$.JjfDIOpVQFv53xe92bkS.6KcxVK5J9DetEdhCNdc778B.bOjLwEO', 'user', 'user', '2023-07-08 10:18:19', 2);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tickets_priority`
--
ALTER TABLE `tickets_priority`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets_responses`
--
ALTER TABLE `tickets_responses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
