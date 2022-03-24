-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 09:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebookverson2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(225) DEFAULT NULL,
  `comment_date` datetime DEFAULT current_timestamp(),
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `comment_date`, `post_id`, `user_id`) VALUES
(115, 'no', '2022-03-23 12:33:43', 128, 44),
(116, 'hello', '2022-03-23 12:37:07', 129, 44),
(117, 'hi', '2022-03-23 12:37:55', 129, 44),
(118, 'hello', '2022-03-23 12:38:03', 130, 44),
(119, 'what is the problem here!', '2022-03-23 12:38:22', 130, 44),
(120, 'no', '2022-03-23 12:39:23', 130, 44),
(121, 'hi', '2022-03-23 12:39:30', 131, 44),
(122, 'what is the problem?', '2022-03-23 12:39:43', 131, 44),
(123, 'ssssssssssss', '2022-03-23 12:40:40', 132, 44),
(124, 'hh', '2022-03-23 12:41:32', 132, 44),
(125, 'sdfdsfsdfds', '2022-03-23 12:43:34', 132, 44),
(126, 'sdfsdfsdfsdfsd', '2022-03-23 12:43:40', 132, 44),
(127, 'sdfsdfsdfsdfa', '2022-03-23 12:43:53', 132, 44),
(128, 'sdfsdfsdfsf', '2022-03-23 12:43:56', 132, 44),
(129, 'sdfsdfsfs', '2022-03-23 12:43:58', 132, 44),
(130, 'dfsdfsdfsdfsdfsf', '2022-03-23 12:44:00', 132, 44),
(131, 'sdfs', '2022-03-23 12:44:01', 132, 44),
(132, 'sdfsdfsd', '2022-03-23 12:44:03', 132, 44),
(133, 'sdfsdfsdfdsfs', '2022-03-23 12:44:03', 132, 44),
(134, 'sdfsdfsdfdsfsdf', '2022-03-23 12:44:03', 132, 44),
(135, 'hi', '2022-03-23 15:09:09', 129, 44),
(136, 'no', '2022-03-23 15:09:29', 132, 44),
(137, 'yes', '2022-03-23 15:09:33', 132, 44),
(138, 'haha', '2022-03-23 15:09:42', 129, 44),
(139, 'ASDFGHJ', '2022-03-23 15:12:14', 130, 44),
(140, 'asdfghjk', '2022-03-23 15:12:21', 128, 44),
(141, 'dfghm,', '2022-03-23 15:12:27', 129, 44),
(142, 'hi', '2022-03-23 15:16:10', 129, 44),
(143, 'sdfdsf', '2022-03-23 15:17:44', 128, 44),
(144, 'sdfsdf', '2022-03-23 15:17:50', 129, 44),
(145, 'hi', '2022-03-23 15:20:19', 132, 43),
(146, 'hi', '2022-03-23 15:20:55', 133, 43),
(147, 'dsfas', '2022-03-23 15:21:08', 129, 43),
(148, 'dhjfhdfj', '2022-03-23 15:21:59', 133, 44),
(149, 'ddfdfd', '2022-03-23 15:22:12', 133, 44),
(150, 'sdf', '2022-03-23 15:22:21', 128, 44),
(151, 'dfdfd', '2022-03-23 15:23:01', 133, 44),
(152, 'sdfsdf', '2022-03-23 15:23:18', 130, 44),
(154, 'dd', '2022-03-23 15:40:12', 133, 44);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id_friend` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id_friend`, `user_id`, `friend_id`) VALUES
(59, 43, 44),
(60, 44, 43);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `like_status` int(1) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `like_status`, `post_id`, `user_id`) VALUES
(460, 1, 131, 44),
(461, 1, 130, 44),
(462, 1, 129, 44),
(463, 1, 128, 44),
(464, 1, 132, 44),
(466, 1, 133, 46);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `post_description` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `post_date` datetime DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `post_description`, `image`, `post_date`, `user_id`) VALUES
(128, NULL, 'hi', NULL, '2022-03-23 12:33:35', 44),
(129, NULL, 'hi', NULL, '2022-03-23 12:35:37', 44),
(130, NULL, 'NO problem\r\n', NULL, '2022-03-23 12:35:48', 44),
(131, NULL, '\r\nThat\'s fine for me', 'IMG-623ab1cc1d31d7.83108411.png', '2022-03-23 12:36:12', 44),
(132, NULL, 'wdfgh', NULL, '2022-03-23 12:40:33', 44),
(133, NULL, '', 'IMG-623ad85dc2a9c2.84749837.jpg', '2022-03-23 15:20:45', 43);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `profile` varchar(50) DEFAULT NULL,
  `cover` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `phone`, `email`, `country`, `date_of_birth`, `gender`, `password`, `create_date`, `profile`, `cover`) VALUES
(43, 'Avy', 'PK', '0889708156', 'avypk@gmail.com', 'Australia', '2022-03-02', 'F', '$2y$10$KWzHdQNuo0x35TJEZfM09OJiD856v94o09Gj3ijx1pE8O/MdWEQnu', '2022-03-23', 'IMG-623ad8e05a0352.95541581.jpg', 'IMG-623ad8e058f7c1.75505973.jpg'),
(44, 'Mengyi', 'Yoeng', '0883029295', 'mengyi.yoeng34@gmail.com', 'Bahrain', '2004-06-23', 'M', '$2y$10$c6Mtdw3Tt67Lxn4mQVdaVeUtbDEjTVlNuJoNvHKXDk09UKwd9qRgi', '2022-03-23', 'IMG-623ad9feb18181.96446252.jpg', 'IMG-623ab0fc8837b5.26222005.png'),
(45, 'Avy', 'Crazy', '0889708156', 'crazy@gmail.com', 'Austria', '2022-03-08', 'F', '$2y$10$SWPCEdfRHxLGAoPXenLws.hZZFtlpEsvlYjKqWJwk6b72UsVM97uu', '2022-03-23', 'female.png', NULL),
(46, 'kon', 'Pa', '0883029294', 'c@gmail.com', 'Bangladesh', '2022-03-18', 'M', '$2y$10$rYAs8yxu6yQRV95D1/4R6eLjyh89q6fIW0Hy5xw71.TnaQYKfrzRS', '2022-03-23', 'male.png', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_comments`
-- (See below for the actual view)
--
CREATE TABLE `users_comments` (
`username` varchar(101)
,`profile` varchar(50)
,`user_id` int(11)
,`comment_id` int(11)
,`comment` varchar(225)
,`comment_date` datetime
,`post_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_post`
-- (See below for the actual view)
--
CREATE TABLE `users_post` (
`post_id` int(11)
,`title` varchar(50)
,`post_description` varchar(225)
,`image` varchar(225)
,`post_date` datetime
,`user_id` int(11)
,`username` varchar(101)
,`phone` varchar(10)
,`email` varchar(200)
,`country` varchar(50)
,`date_of_birth` date
,`gender` char(1)
,`password` varchar(200)
,`profile` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `users_comments`
--
DROP TABLE IF EXISTS `users_comments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_comments`  AS SELECT concat(`users`.`first_name`,' ',`users`.`last_name`) AS `username`, `users`.`profile` AS `profile`, `users`.`user_id` AS `user_id`, `comments`.`comment_id` AS `comment_id`, `comments`.`comment` AS `comment`, `comments`.`comment_date` AS `comment_date`, `comments`.`post_id` AS `post_id` FROM (`users` join `comments` on(`comments`.`user_id` = `users`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `users_post`
--
DROP TABLE IF EXISTS `users_post`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_post`  AS SELECT `posts`.`post_id` AS `post_id`, `posts`.`title` AS `title`, `posts`.`post_description` AS `post_description`, `posts`.`image` AS `image`, `posts`.`post_date` AS `post_date`, `users`.`user_id` AS `user_id`, concat(`users`.`first_name`,' ',`users`.`last_name`) AS `username`, `users`.`phone` AS `phone`, `users`.`email` AS `email`, `users`.`country` AS `country`, `users`.`date_of_birth` AS `date_of_birth`, `users`.`gender` AS `gender`, `users`.`password` AS `password`, `users`.`profile` AS `profile` FROM (`posts` left join `users` on(`users`.`user_id` = `posts`.`user_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id_friend`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id_friend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=467;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
