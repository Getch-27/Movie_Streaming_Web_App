-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 11:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_streaming_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Animation'),
(4, 'Comedy'),
(5, 'Crime'),
(6, 'Drama'),
(7, 'Fantasy'),
(8, 'Horror'),
(9, 'Mystery'),
(10, 'Romance'),
(11, 'Science Fiction'),
(12, 'Thriller'),
(13, 'Western'),
(14, 'Documentary'),
(15, 'Musical'),
(16, 'War');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `rating` float NOT NULL,
  `released_year` varchar(255) NOT NULL,
  `duration` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `poster_url` varchar(255) NOT NULL,
  `trailer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `title`, `rating`, `released_year`, `duration`, `description`, `video_url`, `poster_url`, `trailer`) VALUES
(1, 'The Creator', 7.13, '2023', '134', 'Amid a future war between the human race and the forces of artificial intelligence, a hardened ex-special forces agent grieving the disappearance of his wife, is recruited to hunt down and kill the Creator, the elusive architect of advanced AI who has dev', 'abab', 'adda', 'https://www.youtube.com/watch?v=ex3C1-5Dhb8'),
(4, 'The Creator', 7.13, '2023', '134', 'Amid a future war between the human race and the forces of artificial intelligence, a hardened ex-special forces agent grieving the disappearance of his wife, is recruited to hunt down and kill the Creator, the elusive architect of advanced AI who has dev', 'abab', 'adda', 'https://www.youtube.com/watch?v=ex3C1-5Dhb8'),
(56, 'Rebel Moon - Part One: A Child of Fire', 5.7, '2023', '2h 12m', 'When a peaceful settlement on the edge of a distant moon finds itself threatened by the armies of a tyrannical ruling force, a mysterious stranger living among its villagers becomes their best hope for survival.', 'uploads/Rebel Moon - Part One_ A Child of Fire _ Official Trailer _ Netflix.mp4', 'uploads/posterReble moon.jpg', 'https://www.youtube.com/watch?v=fhr3MzT6exg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`movie_id`, `genre_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(4, 4),
(4, 5),
(4, 6),
(56, 1),
(56, 2),
(56, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`movie_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD CONSTRAINT `movie_genres_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`),
  ADD CONSTRAINT `movie_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
