-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 11:26 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `desp` text NOT NULL,
  `image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `desp`, `image`) VALUES
(2, 'About Me', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummyjjjjj\r\n', 'about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banner_contents`
--

CREATE TABLE `banner_contents` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(60) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desp` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_contents`
--

INSERT INTO `banner_contents` (`id`, `sub_title`, `title`, `desp`, `status`) VALUES
(1, 'Hi', 'I am Riad', 'Lorem Ipsum is simply dummy text of the printing and typesettin', 1),
(2, 'Hello', 'I am ghfchf', 'dgdfgdfgdfgdfghf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` int(11) NOT NULL,
  `banner_image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `banner_image`, `status`) VALUES
(12, '12.png', 0),
(14, '14.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_img`) VALUES
(4, 'ZSICN999.png');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `info` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `email`, `city`, `phone`, `info`, `status`) VALUES
(6, 'Sed ', 'local@gmail.com', 'Sed voluptas', '+1 (434) 699-8472', 'Quaerat', 0),
(7, 'Magna anim reprehend', 'kiqonubiw@mailinator.com', 'Atque doloremque fug', '+1 (441) 133-3221', 'Qui maiores eos labo', 0),
(8, 'In at in magnam et d', 'wusexaru@mailinator.com', 'Iste quo illo minim ', '+1 (107) 992-7785', 'Deserunt vero esse a', 1),
(9, 'Dignissimos omnis fu', 'rekykipyp@mailinator.com', 'Voluptate velit eni', '+1 (482) 532-1376', 'Voluptas totam enim ', 0),
(10, 'Voluptatem iure vita', 'nilenysuz@mailinator.com', 'Laborum Minus qui d', '+1 (882) 738-6073', 'Error error et eiusm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `percentage` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `title`, `percentage`, `year`, `status`) VALUES
(1, 'SSC', 90, 2017, 1),
(2, 'HSC', 80, 2019, 1),
(3, 'DIPLOMA', 70, 2022, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

CREATE TABLE `facts` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `count` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facts`
--

INSERT INTO `facts` (`id`, `icon`, `title`, `count`) VALUES
(7, 'fa fa flaticon-award', 'gdgdg', '5464646'),
(8, 'fa fa flaticon-like', 'gsdgs', '43464'),
(9, 'fa fa flaticon-event', 'gdfgdfg', '21'),
(10, 'fa fa flaticon-woman', 'gcfbfhfg', '5646');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `icon`, `link`, `status`) VALUES
(1, 'fa fa-facebook-official', 'https://www.facebook.com/', 1),
(2, 'fa fa-youtube-play', 'https://www.youtube.com/', 1),
(3, 'fa fa-twitter', 'https://twitter.com/?lang=en', 1),
(4, 'fa fa-instagram', 'https://www.instagram.com/', 1),
(7, 'fa fa-reddit', 'https://www.reddit.com/', 0),
(10, 'fa fa-youtube-square', 'https://www.youtube.com/', 0),
(12, 'fa fa-facebook-f', 'https://www.facebook.com/me/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `status`, `created_at`, `time`) VALUES
(18, 'Macaulay Mejia', 'soha@mailinator.com', 'Nisi assumenda magni', 1, '2022-08-21 09:15:43', '00:00:00'),
(20, 'Alexandra Giles', 'mosynijuvi@mailinator.com', 'Sint cumque illum n', 1, '2022-08-21 11:21:20', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desp` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `desp`, `status`) VALUES
(19, 'fa fa-wikipedia-w', 'wordpress service hghgh', 'WordPress is a free and open-source content management system written in PHP and paired with a MySQL or MariaDB database with supported HTTPS. Features include a plugin architecture and a template system, referred to within WordPress as Themes', 1),
(20, 'fa fa-wifi', 'wifi service', 'Wi-Fi is a wireless networking technology that allows devices such as computers (laptops and desktops), mobile devices (smart phones and wearables), and other equipment (printers and video cameras) to interface with the Internet.', 1),
(21, 'fa fa-youtube', 'Youtube service', 'YouTube is an American online video sharing and social media platform headquartered in San Bruno, California. It was launched on February 14, 2005, by Steve Chen, Chad Hurley, and Jawed Karim. It is currently owned by Google, and is the second most', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `avatar_info` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `testmonial_image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `avatar_info`, `content`, `testmonial_image`, `status`) VALUES
(5, 'Zeus Velez', 'Commodo irure evenie', 'Fugiat a cupiditate ', 'DVOXGJ982.jpg', 1),
(6, 'Raja Burgess', 'Quos ea consequatur ', 'Sint dolore quam in', 'PABUVZ822.jpg', 1),
(7, 'Uriel Richard', 'Dolore voluptates in', 'Nam libero sit qui ', 'AZGTFE268.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `profile_photo` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_photo`, `role`) VALUES
(4, 'Admin', 'admin@gmail.com', '$2y$10$JmDkqfwo6F0p0xtMsXLwwOAo5f1PTlcqQuM6rIU6pR6bxQLrlDst2', '4.jpg', 1),
(17, 'modarator', 'modarator@gmail.com', '$2y$10$lIR/fdnKyvLPHPVIhuCN/eJS8SWNeC8qpvfZf7gecUwy03pYe4ewG', '17.jpg', 2),
(18, 'abir', 'abir@gmail.com', '$2y$10$hQmq91J8zxtjIJxSKvZdt.jV/8AhvzFiIE7oq0aQLJ4hXQm/zP.ne', '18.webp', 3),
(19, 'user', 'user@gmail.com', '$2y$10$qH0zJWpEu.HeYluNYQEq6Ovom8BDUPkYHCTLKLfFeGVO4whUQl7Ya', '19.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desp` text NOT NULL,
  `project_image` varchar(60) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `added_by`, `category`, `project_name`, `title`, `desp`, `project_image`, `status`) VALUES
(24, 1, 'emil', 'Email Marketing', 'Send customized email marketing campaigns designed to bring visitors', '\r\nDrive More Traffic to Your Website\r\nGet all the marketing solutions and integrations you need to promote your website and get more eyes on your site.\r\n\r\nEmail Marketing\r\nSend customized email marketing campaigns designed to bring visitors to your site. Set up triggered emails that respond to site actions.', 'OTYHC430.jpg', 1),
(25, 1, 'marketing', 'Marketing Integrations', 'Easily sync to a variety of apps that integrate right into your site giving', 'Marketing Integrations\r\nEasily sync to a variety of apps that integrate right into your site giving you all the marketing functionality that you need.', 'WOFDV296.jpg', 1),
(26, 1, 'web', 'official web design', 'Ipsum passages, and more recently with desktop', 'ndustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets', 'GRNBY873.jpg', 1),
(27, 1, 'Events', 'Promote your events', 'Promote your events with the industry-leading event management platform.', 'Promote your events with the industry-leading event management platform. Sell tickets, collect RSVPs and host and showcase your events online.', 'GCJEA299.jpg', 1),
(28, 1, 'e comarce', 'Restaurants', 'Manage and grow your restaurant business online. Create professional menus, take', 'Manage and grow your restaurant business online. Create professional menus, take online orders and accept secure online payments—all from your site', 'LMNOY451.jpg', 1),
(29, 1, 'Online', 'Online Scheduling ', 'Take bookings online and manage them right from your site. Host sessions online', 'Take bookings online and manage them right from your site. Host sessions online with Zoom, offer memberships or packages', 'SGAOB684.jpg', 1),
(31, 5, 'Esse mollit eum qui', 'Lewis Farrell', 'Consequat Fugiat a', 'Veniam sit corrupt', 'HPULX875.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_contents`
--
ALTER TABLE `banner_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facts`
--
ALTER TABLE `facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner_contents`
--
ALTER TABLE `banner_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facts`
--
ALTER TABLE `facts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
