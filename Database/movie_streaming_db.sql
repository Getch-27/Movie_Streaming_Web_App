-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 11:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `username`, `password`) VALUES
(1, 'admin@gmial.com', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `creator`
--

CREATE TABLE `creator` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creator`
--

INSERT INTO `creator` (`id`, `username`, `password`) VALUES
(1, 'creator', '123'),
(2, 'creator2', '123');

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
(11, 'Sci-Fi'),
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
(78, 'Finding Nemo', 8.2, '2003', '1h 40m', 'After his son is captured in the Great Barrier Reef and taken to Sydney, a timid clownfish sets out on a journey to bring him home.', 'uploads/Finding Nemo - 2003.mp4', 'uploads/poster/mimo.jpg', '2zLkasScy7A?si=00eVEkFr20bZaOvS'),
(79, 'Rebel Moon - Part One: A Child of Fire', 5.6, '2023', '2h 13m', 'When a peaceful settlement on the edge of a distant moon finds itself threatened by the armies of a tyrannical ruling force, a mysterious stranger living among its villagers becomes their best hope for survival.', 'uploads/Rebel Moon.mp4', 'uploads/poster/reble moon.jpeg', 'fhr3MzT6exg?si=F2Z89W8gTBtN95S0'),
(80, 'the creator', 6.8, '2023', '2h 13m', 'Against the backdrop of a war between humans and robots with artificial intelligence, a former soldier finds the secret weapon, a robot in the form of a young child.', 'uploads/The Creator 2023.mp4', 'uploads/poster/the creator.jpeg', 'ex3C1-5Dhb8?si=Rcw8kl6DtOaiwz37'),
(81, 'Black Panther', 7.3, '2018', '2h 14m', 'T\'Challa, heir to the hidden but advanced kingdom of Wakanda, must step forward to lead his people into a new future and must confront a challenger from his country\'s past.', 'uploads/Black Panther.mp4', 'uploads/poster/black panther.jpg', 'xjDjIWPwcPU?si=4pC_6tXC7krP5_tE'),
(82, 'Inception', 8.8, '2010', '2h 28m', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.', 'uploads/Inception.mp4', 'uploads/poster/Inception.jpg', '5EiV_HXIIGs?si=DdVXBj35WsqxHNek'),
(83, 'Forrest Gump', 8.8, '1994', '2h 22m', 'The history of the United States from the 1950s to the \'70s unfolds from the perspective of an Alabama man with an IQ of 75, who yearns to be reunited with his childhood sweetheart.', 'uploads/Forrest Gump.mp4', 'uploads/poster/Forrest Gump.jpg', ''),
(84, 'The Shawshank Redemption', 9.3, '1994', '2h 22m', 'Over the course of several years, two convicts form a friendship, seeking consolation and, eventually, redemption through basic compassion.', 'uploads/Shawshank redemption.mp4', 'uploads/poster/Redemption.jpg', 'PLl99DlL6b4?si=0hz5kJJQyh6cOqRD'),
(85, 'John Wick', 7.3, '2014', '1h 41m', 'An ex-hitman comes out of retirement to track down the gangsters who killed his dog and stole his car.', 'uploads/John Wick.mp4', 'uploads/poster/John Wick.jpg', 'qEVUtrk8_B4?si=4eG5Zx4R74h2JhTP'),
(86, 'The Dark Knight', 9, '2008', '2h 32m', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'uploads/The Dark Knight.mp4', 'uploads/poster/The Dark Knight.jpg', 'zkNDVV2RpQg?si=jHtHp9zh0fKGtfo9'),
(87, 'The Godfather', 9.2, '1972', '2h 55m', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'uploads/The Godfather.mp4', 'uploads/poster/the Godfather.jpg', 'UaVTIH8mujA?si=qhEmbXK2IB5mQlg6'),
(88, 'Avatar: The Way of Water', 7.6, '2022', '3h 12m', 'Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their home.', 'uploads/Avatar_ The Way of Water (2022).mp4', 'uploads/poster/avatar.jpg', 'd9MyW72ELq0?si=36Drg63B7JQNyQJ1'),
(89, 'It: Chapter Two', 6.5, '2019', '2h 49m', 'Twenty-seven years after their first encounter with the terrifying Pennywise, the Losers Club have grown up and moved away, until a devastating phone call brings them back.', 'uploads/IT_ CHAPTER 2  2019.mp4', 'uploads/poster/it.jpg', 'xhJ5P7Up3jA?si=_Wx5LEk4hZREiv58'),
(90, 'Venom', 6.6, '2018', '1h 52m', 'A failed reporter is bonded to an alien entity, one of many symbiotes who have invaded Earth. But the being takes a liking to Earth and decides to protect it.', 'uploads/venom.mp4', 'uploads/poster/venom.jpg', 'u9Mv98Gr5pY?si=PIVm7empSoZJZNG9');

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
(78, 2),
(78, 3),
(78, 4),
(79, 1),
(79, 2),
(79, 6),
(80, 1),
(80, 2),
(80, 6),
(81, 1),
(81, 2),
(81, 11),
(82, 1),
(82, 2),
(82, 11),
(83, 6),
(83, 10),
(84, 6),
(85, 1),
(85, 5),
(85, 12),
(86, 1),
(86, 5),
(86, 6),
(87, 5),
(87, 6),
(88, 1),
(88, 2),
(88, 7),
(89, 6),
(89, 7),
(89, 8),
(90, 1),
(90, 2),
(90, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `username`, `password`) VALUES
(1, 'getahunfikadurcde@gmail.com', 'getch', '1'),
(2, 'jo@gmail.com', 'jo', '1'),
(8, 'getahunfikadurcde@gmail.com', 'getch', '123'),
(9, 'bereketlegesse22@gmail.com', 'bek', '123');

-- --------------------------------------------------------

--
-- Table structure for table `watch_list`
--

CREATE TABLE `watch_list` (
  `watch_list_id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watch_list`
--

INSERT INTO `watch_list` (`watch_list_id`, `movie_id`, `user_id`) VALUES
(5, 78, 1),
(6, 79, 2),
(7, 80, 1),
(8, 81, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `watch_list`
--
ALTER TABLE `watch_list`
  ADD PRIMARY KEY (`watch_list_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `creator`
--
ALTER TABLE `creator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `watch_list`
--
ALTER TABLE `watch_list`
  MODIFY `watch_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD CONSTRAINT `movie_genres_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`),
  ADD CONSTRAINT `movie_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`);

--
-- Constraints for table `watch_list`
--
ALTER TABLE `watch_list`
  ADD CONSTRAINT `watch_list_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`),
  ADD CONSTRAINT `watch_list_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
