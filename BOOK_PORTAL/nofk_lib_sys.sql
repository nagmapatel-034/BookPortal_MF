-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 08:49 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nofk_lib_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `author_id` int(5) NOT NULL,
  `author_fname` varchar(50) NOT NULL,
  `author_lname` varchar(50) NOT NULL,
  `author_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`author_id`, `author_fname`, `author_lname`, `author_description`) VALUES
(1111, 'William', 'ShakeSpear', 'old poetry'),
(2121, 'Master', 'yI', 'asdad'),
(2222, 'Leong', 'Wah ', 'old poetry');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `category_id` int(3) NOT NULL,
  `book_id` int(6) NOT NULL,
  `genre_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`category_id`, `book_id`, `genre_id`) VALUES
(1, 1321, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_contributor`
--

CREATE TABLE `book_contributor` (
  `contribute_id` int(4) NOT NULL,
  `book_id` int(6) NOT NULL,
  `author_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_contributor`
--

INSERT INTO `book_contributor` (`contribute_id`, `book_id`, `author_id`) VALUES
(2222, 1321, 1111),
(3333, 1321, 2121),
(4444, 1321, 2222);

-- --------------------------------------------------------

--
-- Table structure for table `book_genre`
--

CREATE TABLE `book_genre` (
  `genre_id` int(4) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_genre`
--

INSERT INTO `book_genre` (`genre_id`, `genre_name`) VALUES
(1, 'Business'),
(2, 'Thriller'),
(3, 'Romance'),
(4, 'Mystery'),
(5, 'Poetry'),
(6, 'Non Fiction'),
(7, 'Horror'),
(8, 'Religious'),
(9, 'Comic'),
(10, 'Lifestyle'),
(11, 'General'),
(12, 'Paranormal'),
(13, 'Magazines'),
(14, 'IT & Technology'),
(15, 'Random');

-- --------------------------------------------------------

--
-- Table structure for table `book_items`
--

CREATE TABLE `book_items` (
  `book_id` int(6) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `book_isbn` varchar(20) NOT NULL,
  `book_page` int(11) DEFAULT NULL,
  `book_year` year(4) NOT NULL,
  `book_location` varchar(100) NOT NULL,
  `book_material` varchar(20) NOT NULL,
  `book_status` varchar(20) NOT NULL,
  `book_unit` int(3) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `publisher_id` int(5) NOT NULL,
  `contributor_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_items`
--

INSERT INTO `book_items` (`book_id`, `book_title`, `book_isbn`, `book_page`, `book_year`, `book_location`, `book_material`, `book_status`, `book_unit`, `image_url`, `publisher_id`, `contributor_id`) VALUES
(1321, 'Romoe', '123112312', 20, 2017, '123213', 'paper', 'available', 1, 'imageurl romeo', 1111, 2222),
(13123, 'Juliet', 'dasd a', 124, 2010, 'FSKTM', 'paper', 'unavailable', NULL, 'asdsadasdd', 3233, 3211);

-- --------------------------------------------------------

--
-- Table structure for table `book_publisher`
--

CREATE TABLE `book_publisher` (
  `publisher_id` int(5) NOT NULL,
  `publisher_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_publisher`
--

INSERT INTO `book_publisher` (`publisher_id`, `publisher_name`) VALUES
(1111, 'Starlight');

-- --------------------------------------------------------

--
-- Table structure for table `book_rating`
--

CREATE TABLE `book_rating` (
  `rating_id` int(7) NOT NULL,
  `rating` int(2) NOT NULL,
  `rating_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `book_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_rating`
--

INSERT INTO `book_rating` (`rating_id`, `rating`, `rating_date`, `book_id`, `user_id`) VALUES
(41, 5, '2018-09-23 13:18:34', 323331, 123331),
(42, 3, '2018-09-24 14:03:43', 1321, 0),
(43, 3, '2018-09-25 15:22:28', 1321, 4444);

-- --------------------------------------------------------

--
-- Table structure for table `book_review`
--

CREATE TABLE `book_review` (
  `review_id` int(7) NOT NULL,
  `review` varchar(2500) NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `book_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_review`
--

INSERT INTO `book_review` (`review_id`, `review`, `review_date`, `book_id`, `user_id`) VALUES
(2, 'Amazing aAF', '2018-09-24 12:46:40', 1321, 4444),
(3, 'master of all 4 element', '2018-09-24 12:44:33', 1321, 5555),
(4, 'Retard', '2018-09-24 12:46:40', 1321, 6666),
(5, 'Wonderful', '2018-09-24 12:46:40', 1321, 7777),
(6, 'I got shocked', '2018-09-24 12:46:40', 1321, 8888);

-- --------------------------------------------------------

--
-- Table structure for table `read_record`
--

CREATE TABLE `read_record` (
  `record_id` int(7) NOT NULL,
  `record_date` datetime NOT NULL,
  `book_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_preference`
--

CREATE TABLE `user_preference` (
  `preference_id` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_reader`
--

CREATE TABLE `user_reader` (
  `user_id` int(6) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `user_dob` date NOT NULL,
  `user_category` varchar(30) NOT NULL DEFAULT 'Student',
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_state` varchar(20) NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'active',
  `login_timestamp` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reader`
--

INSERT INTO `user_reader` (`user_id`, `user_fname`, `user_lname`, `username`, `userpass`, `user_dob`, `user_category`, `user_email`, `user_phone`, `user_address`, `user_city`, `user_state`, `user_status`, `login_timestamp`, `updated_at`, `created_at`, `remember_token`) VALUES
(111, 'Alice', 'Graham', 'ash', '$2y$10$YdZCTN/UuzFI/D7KJssSZu/vcVUW843wdVVVN43z/61TOpLngLzmu', '2018-09-04', 'Student', 'ash@gg.com', '1123332211', 'Jln Kg', 'Serdang', 'Selangor', 'active', NULL, '2018-09-25 06:59:16', '2018-09-25 06:59:16', ''),
(3102, 'tee', 'sy', 'tsyew', '', '1997-09-19', 'Student', 'tsy1231@gg.com', '0103322112', 'ktp', 'upm', 'selangor', 'active', NULL, '2018-09-27 06:46:49', '2018-09-27 06:46:49', 'ueJaiP7IAFFR7gP1POoScl23DMHWEZVIsr2lFSG38OjzB4n3kY3X45uCe1MQ'),
(4444, 'Micheal', 'Yoh', 'micheal', '123321', '2016-06-12', 'working', 'micheal@gg.com', '198888222', '10 , Jalan Kedah', 'Alor Setar', 'Kedah', 'Active', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(5511, 'tee', 'sy', 'tsy', '$2y$10$Wzxh/lZhOLt8qYqo4lP0xuSjS4mF4lHf7ObHJgYvCpljnzdgHNuDi', '2018-09-04', 'Student', 'tsy@gg.com', '123332221', 'ktp', 'upm', 'selangor', 'active', NULL, '2018-09-25 15:55:54', '2018-09-25 15:55:54', 'LllM5auC29V92z5YkbbxdxlNEllTAgNjT2gAGv3UR03mApJnUoRvZOrpRX03'),
(5555, 'Rachel', 'Leong', 'rachel', '123123', '2017-10-18', 'student', 'rachel@gmail.com', '132211221', 'Uni Pm', 'serdang', 'Selangor', 'Active', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(6666, 'Micheal1', 'Yoh', 'micheal', '123321', '2016-06-12', 'working', 'micheal@gg.com', '198888222', '10 , Jalan Kedah', 'Alor Setar', 'Kedah', 'Active', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(7777, 'Micheal2', 'Yoh', 'micheal', '123321', '2016-06-12', 'working', 'micheal@gg.com', '198888222', '10 , Jalan Kedah', 'Alor Setar', 'Kedah', 'Active', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(8888, 'Micheal3', 'Yoh', 'micheal', '123321', '2016-06-12', 'working', 'micheal@gg.com', '198888222', '10 , Jalan Kedah', 'Alor Setar', 'Kedah', 'Active', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(9999, 'Micheal4', 'Yoh', 'micheal', '123321', '2016-06-12', 'working', 'micheal@gg.com', '198888222', '10 , Jalan Kedah', 'Alor Setar', 'Kedah', 'Active', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `fk_category_book` (`book_id`),
  ADD KEY `fk_category_genre` (`genre_id`);

--
-- Indexes for table `book_contributor`
--
ALTER TABLE `book_contributor`
  ADD PRIMARY KEY (`contribute_id`),
  ADD KEY `fk_contributor_author` (`author_id`),
  ADD KEY `fk_contributor_book` (`book_id`);

--
-- Indexes for table `book_genre`
--
ALTER TABLE `book_genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `book_items`
--
ALTER TABLE `book_items`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_book_publisher` (`publisher_id`),
  ADD KEY `fk_book_contributor` (`contributor_id`);

--
-- Indexes for table `book_publisher`
--
ALTER TABLE `book_publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `book_rating`
--
ALTER TABLE `book_rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `fk_rating_book` (`book_id`),
  ADD KEY `fk_rating_user` (`user_id`);

--
-- Indexes for table `book_review`
--
ALTER TABLE `book_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_review_book` (`book_id`),
  ADD KEY `fk_review_user` (`user_id`);

--
-- Indexes for table `read_record`
--
ALTER TABLE `read_record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `fk_record_book` (`book_id`),
  ADD KEY `fk_record_user` (`user_id`);

--
-- Indexes for table `user_preference`
--
ALTER TABLE `user_preference`
  ADD PRIMARY KEY (`preference_id`);

--
-- Indexes for table `user_reader`
--
ALTER TABLE `user_reader`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_author`
--
ALTER TABLE `book_author`
  MODIFY `author_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2223;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_contributor`
--
ALTER TABLE `book_contributor`
  MODIFY `contribute_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4445;

--
-- AUTO_INCREMENT for table `book_genre`
--
ALTER TABLE `book_genre`
  MODIFY `genre_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `book_items`
--
ALTER TABLE `book_items`
  MODIFY `book_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13124;

--
-- AUTO_INCREMENT for table `book_publisher`
--
ALTER TABLE `book_publisher`
  MODIFY `publisher_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT for table `book_rating`
--
ALTER TABLE `book_rating`
  MODIFY `rating_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `book_review`
--
ALTER TABLE `book_review`
  MODIFY `review_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `read_record`
--
ALTER TABLE `read_record`
  MODIFY `record_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_preference`
--
ALTER TABLE `user_preference`
  MODIFY `preference_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_reader`
--
ALTER TABLE `user_reader`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
