-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2019 at 06:37 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` varchar(30) NOT NULL,
  `videoid` varchar(30) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `posterid` varchar(30) NOT NULL,
  `postedby` varchar(30) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `videoid`, `comment`, `posterid`, `postedby`, `status`) VALUES
('C-5', 'V-1', 'hiiiiiiii', 'U-5', 'a', 1),
('C-7', 'V-2', 'yoo', 'U-5', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `password`, `type`) VALUES
('U-2', '8989', 'Admin'),
('U-3', '123', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mailid` varchar(30) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `body` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mailid`, `sender`, `receiver`, `body`) VALUES
('M-2', 'sadiaprodhan@gmail.com', 'hridoyrahman57@gmail.com', 'you have been warned'),
('M-3', 'abc@yahoo.com', 'sadia@yahoo.com', ' hu'),
('M-4', 'abc@yahoo.com', 'hridoyrahman57@gmail.com', ' yoo'),
('M-5', 'abc@yahoo.com', 'sadiaprodhan@gmail.com', 'you have been warned');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notes_ID` varchar(30) NOT NULL,
  `notes_path` varchar(30) NOT NULL,
  `poster_id` varchar(30) NOT NULL,
  `poster_name` varchar(30) NOT NULL,
  `Subject` varchar(30) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notes_ID`, `notes_path`, `poster_id`, `poster_name`, `Subject`, `status`) VALUES
('N-1', '/project/notes/DHCP.docx', 'U-7', 'Ariana', 'ACN, DHCP ', 1),
('N-2', '/project/notes/DSP.pdf', 'U-3', 'Anis', 'Dec, DIgital Signal', 1),
('N-4', '/project/notes/555.pdf', 'U-9', 'Hridoy', 'Dec,timer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` varchar(30) NOT NULL,
  `poster_type` varchar(30) NOT NULL,
  `poster_name` varchar(30) NOT NULL,
  `notice_text` varchar(30) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `poster_type`, `poster_name`, `notice_text`, `status`) VALUES
('Notice2', 'Admin', 'abi', 'fuuu', 0),
('Notice3', 'Admin', 'a', ' hi', 1),
('Notice4', 'Admin', 'a', ' hiii', 1),
('Notice5', 'Admin', 'a', ' hi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `onlinevideo`
--

CREATE TABLE `onlinevideo` (
  `videoid` varchar(30) NOT NULL,
  `posterid` varchar(30) NOT NULL,
  `postedby` varchar(30) NOT NULL,
  `videolink` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlinevideo`
--

INSERT INTO `onlinevideo` (`videoid`, `posterid`, `postedby`, `videolink`, `description`) VALUES
('V-1', 'U-3', 'Anis', '/project/onlinevideo/Physics.mp4', 'Physics =, HSC'),
('V-2', 'U-4', 'Fahad', '/project/onlinevideo/AnimalKingdom.mp4', 'class 8, Animal kingdom');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`) VALUES
('U-2', 'sadia', 'sadia@yahoo.com', 'Female'),
('U-3', 'Anis', 'hridoyrahman57@gmail.com', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mailid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notes_ID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `onlinevideo`
--
ALTER TABLE `onlinevideo`
  ADD PRIMARY KEY (`videoid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
