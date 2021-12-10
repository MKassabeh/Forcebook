-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2021 at 05:27 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webforce3-mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `created_by` int NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `created_by`, `content`, `created_at`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\n\r\nDonec neque diam, lobortis vitae tortor a, accumsan bibendum lacus. Fusce eget condimentum eros, sed molestie nunc. ', '2020-09-01 21:38:03'),
(2, 2, 'Look at these words. Are they small words? And he referred to my words - if they\'re small, something else must be small. I guarantee you there\'s no problem, I guarantee. Lorem Ispum is a choke artist. It chokes! An \'extremely credible source\' has called my office and told me that Lorem Ipsum\'s birth certificate is a fraud.', '2021-04-27 16:04:31'),
(3, 2, 'I\'m speaking with myself, number one, because I have a very good brain and I\'ve said a lot of things. An ‘extremely credible source’ has called my office and told me that Barack Obama’s placeholder text is a fraud. I have a 10 year old son. He has words. He is so good with these words it\'s unbelievable.', '2021-04-27 16:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(127) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`) VALUES
(1, 'Elon Musk', 'elon@tesla.com'),
(2, 'Donald Trump', 'donald@trump.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_user` (`created_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
