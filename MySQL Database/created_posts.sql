-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 11:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creating_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `created_posts`
--

CREATE TABLE `created_posts` (
  `offer_id` bigint(20) NOT NULL,
  `get_user_id` varchar(30) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `company` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `salary` int(11) NOT NULL,
  `date_post` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `created_posts`
--

INSERT INTO `created_posts` (`offer_id`, `get_user_id`, `title`, `description`, `company`, `location`, `salary`, `date_post`) VALUES
(611282, '959319954408', 'BACK END', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, ducimus repellat earum obcaecati, a expedita esse ipsam nemo totam in labore error autem cum, fuga quos repudiandae id ab libero.\r\n', 'FFLS', 'London', 2222, '04-08-2021'),
(35456389, '9223372036854775807', 'Senior', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque hic debitis quos. Dignissimos error earum dolore itaque quisquam, eius dicta in odio veritatis eos voluptas aliquam rerum nisi sit molestias!\r\n', 'PLP', 'Germany', 3333, '04-08-2021'),
(1424188533, '9223372036854775807', 'Junior', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque hic debitis quos. Dignissimos error earum dolore itaque quisquam, eius dicta in odio veritatis eos voluptas aliquam rerum nisi sit molestias!\r\n', 'WWS', 'Netherlands', 4444, '04-08-2021'),
(8020325601, '959319954408', 'FRONT END', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, ducimus repellat earum obcaecati, a expedita esse ipsam nemo totam in labore error autem cum, fuga quos repudiandae id ab libero.\r\n', 'RTSE', 'Canada', 1111, '04-08-2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `created_posts`
--
ALTER TABLE `created_posts`
  ADD PRIMARY KEY (`offer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `created_posts`
--
ALTER TABLE `created_posts`
  MODIFY `offer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9223372036854775807;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
