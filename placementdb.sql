-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306
-- Generation Time: Mar 18, 2022 at 06:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placementdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`) VALUES
('admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `s_usn` varchar(10) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `is_approved` varchar(3) DEFAULT NULL,
  `is_placed` varchar(3) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`s_usn`, `comp_id`, `designation_id`, `is_approved`, `is_placed`, `updated_at`) VALUES
('4UB15EC001', 3, 1, 'YES', 'YES', '2022-03-18 15:17:34'),
('4UB15EE034', 1, 2, 'YES', 'YES', '2022-02-11 05:00:38'),
('4UB15ME020', 3, 1, 'YES', 'YES', '2022-03-18 15:13:53'),
('4UB18CV045', 1, 1, 'NO', 'NO', '2022-02-11 04:54:25'),
('4UB18CV045', 2, 1, 'YES', 'YES', '2022-02-11 04:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp_id` int(11) NOT NULL,
  `comp_name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `comp_name`, `address`, `email`, `image`, `description`) VALUES
(1, 'Infosys', 'Bangalore', 'infosys@gmail.com', 'IMG-620626ecc54a94.83265443.jpeg', 'Infosys is a global leader in next-generation digital services and consulting. We enable clients in more than 50 countries to navigate their digital transformation. With over four decades of experience in managing the systems and workings of global enterprises, we expertly steer our clients through their digital journey. We do it by enabling the enterprise with an AI-powered core that helps prioritize the execution of change. We also empower the business with agile digital at scale to deliver unprecedented levels of performance and customer delight. Our always-on learning agenda drives their continuous improvement through building and transferring digital skills, expertise, and ideas from our innovation ecosystem.'),
(2, 'TCS', 'Hyderabad', 'tcs@gmail.com', 'IMG-62062b91234d97.23034946.jpeg', 'Tata Consultancy Services (TCS) is a software and services provider in India. It is part of the Tata Group, which oversees operations for over 100 companies in seven business sectors: communications and information technology, engineering, materials, services, energy, consumer products and chemicals.'),
(3, 'Wipro', 'Delhi', 'wipro@gmail.com', 'IMG-62062c76ecb819.55929084.jpeg', 'Wipro Limited is a provider of IT services, including Systems Integration, Consulting, Information Systems outsourcing, IT-enabled services, and R&D services. Wipro entered into the technology business in 1981 and has over 221,890 employees and clients across 110 countries.'),
(4, 'Cognizant', 'Bangalore', 'cognizant@gmail.com', 'IMG-62062d95eeaf89.60861443.jpeg', 'Cognizant Technology Solutions is a company that provides information technology, consulting, and business process outsourcing services. It operates through four segments: Financial Services; Healthcare; Products and Resources; as well as Communications, Media, and Technology. Cognizant offers digital services and solutions, consulting, application development, systems integration, application testing, application maintenance, infrastructure services, and business process services. The company also develops, licenses, implements, and supports proprietary and third-party software products and platforms.'),
(5, 'JP Morgan', 'Bangalore', 'jpmorgan@gmail.com', 'IMG-62062e4160d511.75514250.jpeg', 'J.P. Morgan is a global leader in financial services, offering solutions to the worlds most important corporations, governments and institutions in more than 100 countries. As announced in early 2018, JPMorgan Chase will deploy $1.75 billion in philanthropic capital around the world by 2023. We also lead volunteer service activities for employees in local communities by utilizing our many resources, including those that stem from access to capital, economies of scale, global reach and expertise.');

-- --------------------------------------------------------

--
-- Table structure for table `comp_designation`
--

CREATE TABLE `comp_designation` (
  `comp_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `package` float NOT NULL,
  `min_cgpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comp_designation`
--

INSERT INTO `comp_designation` (`comp_id`, `designation_id`, `designation`, `description`, `package`, `min_cgpa`) VALUES
(1, 1, 'software engineer', 'Must have knowledge of java and database management system', 7.3, 7.8),
(1, 2, 'Assistant system engineer', 'Must have basic knowledge of Object Oriented programming', 3.6, 6.2),
(2, 1, 'Android Developer', 'Prerequisites : java, android studio with2 years of experience', 7.8, 7),
(3, 1, 'System Engineer', 'One should have hands on experience on python and testing tools.', 4.5, 7.5),
(5, 1, 'Software Engineer', 'One has to be good at problem solving and must have atleast 1 internship done on data science', 21, 7.8);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_usn` varchar(10) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `s_email` varchar(30) NOT NULL,
  `s_password` varchar(20) NOT NULL,
  `s_phone` varchar(10) NOT NULL,
  `s_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_usn`, `s_name`, `s_email`, `s_password`, `s_phone`, `s_image`) VALUES
('4UB15EC001', 'Asha', 'asha@gmail.com', '123', '1133557799', 'IMG-6205e7027d36e9.49172407.jpeg'),
('4UB15EE034', 'Rajesh S', 'rajesh@gmail.com', '123', '1234512345', 'IMG-6205e4c19a4b29.70361704.jpeg'),
('4UB15ME020', 'Nagaraj', 'nagaraj@gmail.com', '123', '2244668800', 'IMG-6205e8ae4ec404.53265243.jpeg'),
('4UB18CV045', 'Varun', 'varun@gmail.com', '123', '1231231323', 'IMG-6205ed111d0249.36705478.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `student_report`
--

CREATE TABLE `student_report` (
  `s_usn` varchar(10) NOT NULL,
  `s_sem` int(11) NOT NULL,
  `s_branch` varchar(10) NOT NULL,
  `s_cgpa` float NOT NULL,
  `is_placed` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_report`
--

INSERT INTO `student_report` (`s_usn`, `s_sem`, `s_branch`, `s_cgpa`, `is_placed`) VALUES
('4UB15EC001', 7, 'EC', 9.12, 'YES'),
('4UB15EE034', 7, 'EE', 6.6, 'YES'),
('4UB15ME020', 7, 'MECH', 8.5, 'YES'),
('4UB18CV045', 7, 'CIVIL', 8.67, 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`s_usn`,`comp_id`,`designation_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `comp_designation`
--
ALTER TABLE `comp_designation`
  ADD PRIMARY KEY (`comp_id`,`designation_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_usn`);

--
-- Indexes for table `student_report`
--
ALTER TABLE `student_report`
  ADD PRIMARY KEY (`s_usn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`s_usn`) REFERENCES `student` (`s_usn`) ON DELETE CASCADE,
  ADD CONSTRAINT `applicants_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`) ON DELETE CASCADE;

--
-- Constraints for table `comp_designation`
--
ALTER TABLE `comp_designation`
  ADD CONSTRAINT `comp_designation_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_report`
--
ALTER TABLE `student_report`
  ADD CONSTRAINT `student_report_ibfk_1` FOREIGN KEY (`s_usn`) REFERENCES `student` (`s_usn`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
