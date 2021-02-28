-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2019 at 09:36 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hairline`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_story` text NOT NULL,
  `about_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_title`, `about_story`, `about_img`) VALUES
(1, 'Blessing Hairline Company', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure magnam rerum est quisquam ab sunt assumenda optio pariatur saepe beatae. Blanditiis ab magnam hic necessitatibus aperiam quidem provident ut, voluptates, laboriosam illo reprehenderit ullam dicta asperiores, natus possimus delectus tempora. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequuntur quia maiores explicabo temporibus assumenda! Ab molestiae et ipsam sunt nemo sed, ducimus similique eaque a, ullam quis reiciendis vel. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis maiores inventore, velit harum sed, sequi culpa eum id quam autem aliquam incidunt suscipit voluptatem vitae quas veritatis rem voluptates nam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint facilis neque illo sapiente cupiditate, corporis a ut laborum nam eligendi. Dolore quisquam ut illo officia impedit. Vitae est quia delectus!. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', 'ban.jpg'),
(2, 'Blessing Hairline Company', '<p>After almost a decade as an influencer, I’ve worked with and tried some of the best and the worst hair in the industry. I’ve narrowed it down and I’ve found that RAW hair is the most consistent in quality, mainly because it comes straight from the donor with very little to no manipulation.&nbsp;</p><p>I’ve heard a lot of your complaints when it comes to the inconsistencies in the hair market so&nbsp; I’ve spent several years researching, studying, and sourcing the best hair. That’s how I came up with the Peakmill Raw Hair Collection.&nbsp;</p>', 'ban.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(3) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_desc` text NOT NULL,
  `book_date` varchar(255) NOT NULL,
  `book_time` varchar(255) NOT NULL,
  `book_location` text NOT NULL,
  `book_price` varchar(255) NOT NULL,
  `book_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `book_title`, `book_desc`, `book_date`, `book_time`, `book_location`, `book_price`, `book_image`) VALUES
(1, 'Blessing Hairline Wig Class 2019', '<p>Blessing Hairline</p>', '12th, May 2019', '8 AM to 5 PM', 'Eko Hotel, Lagos Nigeria', 'N40,000', 'bann.jpg'),
(2, 'Blessing Hairline Braid Class 2019', '<p>Blessing Hairline Braid Class</p>', '12th, August 2019', '8 AM to 12 PM', 'Eko Hotel, Lagos Nigeria', 'N80,000', 'b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(3) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Curls'),
(2, 'Braids'),
(3, 'Raw Hair'),
(4, 'Virgin Hair'),
(5, 'Coats'),
(6, 'Double Drawn');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_price` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_quantity` int(11) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `pmode` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `country`, `zip`, `pmode`, `products`, `amount_paid`, `status`) VALUES
(1, 'Ojajuni Blessing', 'hairline@gmail.com', '08056892348', 'No 8 slimu street, Ikeja Lagos', 'Nigeria', '+234', 'cod', 'Brazilian Hair(1), All Back(1), Nigerian Hair(1)', '235000', 'confirmed'),
(2, 'Ojajuni Blessing', 'demo1@yahoo.com', '08185764594', 'No 8 slimu street, Ikeja Lagos', 'Nigeria', '+234', 'transfer', 'Brazilian Hair(1), All Back(1), Nigerian Hair(1)', '235000', ''),
(3, 'Ojajuni Blessing', 'hairline@gmail.com', '08056892348', 'No 8 slimu street, Ikeja Lagos', 'Nigeria', '+234', 'cod', 'Russian Hair(1)', '15000', ''),
(4, 'Sunday Andrew', 'sunday@gmail.com', '08056892348', 'No 8 slimu street, Ikeja Lagos', 'Nigeria', '+234', 'bank transfer', 'Russian Hair(2), Brazilian Hair(2)', '58000', ''),
(5, 'Sunday Andrew', 'hairline@gmail.com', '08056892348', 'No 8 slimu street, Ikeja Lagos', 'Nigeria', '+234', 'bank transfer', 'Braids(1), Lush Curl(1)', '50000', ''),
(6, 'Chukwuneke Emmanuel', 'onyedikachukwu62@gmail.com', '08134589214', 'No 2 Savage street, Orile Iganmu Lagos', 'Nigeria', '+234', 'bank transfer', 'Nigerian Hair(1)', '200000', ''),
(7, 'Chukwuneke Emmanuel', 'hairline@gmail.com', '08056892348', 'No 8 slimu street, Ikeja Lagos', 'Nigeria', '+234', 'cash on delivery', 'Lush Curl(1)', '30000', ''),
(8, 'Sunday Andrew', 'demo@gmail.com', '08056892348', 'No 8 slimu street, Ikeja Lagos', 'Nigeria', '+234', 'cash on delivery', 'Brazilian Hair(1)', '14000', ''),
(9, 'Sunday Andrew', 'demo1@yahoo.com', '08134589214', 'No 8 slimu street, Ikeja Lagos', 'Nigeria', '+234', 'cash on delivery', 'Braids(1)', '20000', ''),
(10, 'aa', 'aaa', 'aa', 'aa', 'aaa', '5555', 'bank transfer', 'Braids(1)', '20000', ''),
(11, 'Sunday Andrew', 'sunday@gmail.com', '08134589214', 'No 8 slimu street, Ikeja Lagos', 'Nigeria', '+234', 'bank transfer', 'Brazilian Hair(1)', '14000', ''),
(12, 'Sunday Andrew', 'demo1@yahoo.com', '08134589214', 'No 8 slimu street, Ikeja Lagos', 'Nigeria', '+234', 'bank transfer', 'Braids(1), Russian Hair(1)', '35000', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_price` varchar(255) NOT NULL,
  `post_quantity` int(11) NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_user`, `post_category_id`, `post_title`, `post_price`, `post_quantity`, `post_image`, `post_content`, `post_tag`, `post_status`, `post_code`, `post_date`) VALUES
(1, 'Emmanuel', 1, 'Lush Curl', '30000', 3, '1.jpg', '<p>Lush Curls</p>', 'Lush Curls', 'published', 'p1', '2019-08-23 00:00:00'),
(2, 'Emmanuel', 2, 'Braids', '20000', 2, '2.jpg', 'Braids', 'Braids', 'published', 'p2', '2019-08-20 00:00:00'),
(3, 'Emmanuel', 4, 'Brazilian Hair', '14000', 0, '3.jpg', 'Brazilian Hair', 'Brazilian Hair', 'published', 'p3', '2019-08-20 00:00:00'),
(6, 'Emmanuel', 5, 'Nigerian Hair', '200000', 0, '6.jpg', 'Nigerian Hair', 'Nigerian Hair', 'published', 'p6', '2019-08-20 00:00:00'),
(7, 'Emmanuel', 1, 'Russian Hair', '15000', 0, '10.jpg', 'Russian Hair', 'Russian Hair', 'published', 'p7', '2019-08-20 00:00:00'),
(8, 'Emmanuel', 1, 'All Back', '21000', 0, '18.jpg', 'All Back', 'All Back', 'published', 'p8', '2019-08-20 00:00:00'),
(9, 'Emmanuel', 3, 'Coats', '15000', 0, '8.jpg', 'Coats', 'Coats', 'published', 'p9', '2019-08-20 00:00:00'),
(10, 'Emmanuel', 4, 'Indian Hair', '100000', 0, '9.jpg', 'Indian Hair', 'Indian Hair', 'published', 'p10', '2019-08-20 00:00:00'),
(11, 'Blessing', 3, 'Nigerian Hairs', '20000', 2, '20.jpg', '<p>Nigerian Hairs</p>', 'Hair, Double Drawn', 'published', 'p11', '2019-08-25 00:00:00'),
(12, 'Blessing', 1, 'Premium', '120000', 0, 'galleries14.jpg', '<p>sssss</p>', 'Double Drawn', 'published', 'p12', '2019-08-26 00:00:00'),
(13, 'Blessing', 3, 'Russian Hair', '120000', 0, 'IMG-20180501-WA0046.jpg', '<p>aaaaaa</p>', 'Lush Curls', 'published', 'p13', '2019-08-26 00:00:00'),
(14, 'Blessing', 1, 'Brazilian Hair', '45000', 5, 'b.jpg', '<blockquote><p>humanhairnigeria.com.ng is Nigeria\'s &nbsp;leading &nbsp;and most trusted Online Store for quality virgin human hairs. humanhairnigeria.com.ng is a reputable &nbsp;brand known both locally &nbsp;and internationally &nbsp;for 100% pure human hairs. We make it convenient for &nbsp;ladies from all walks of life to have access to a wide selection of real human hairs products from the comfort of their homes or offices and make it even more convenient by delivering their hairs to their doorsteps within 24 hours in Nigeria and within 3 business days outside Nigeria</p></blockquote>', 'Lush Curls', 'published', 'p14', '2019-09-03 00:00:00'),
(15, 'Blessing', 1, 'Russian Hair', '120000', 8, '22.jpg', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'Double Drawn', 'published', 'p15', '2019-09-06 00:00:00'),
(16, 'Blessing', 2, 'Lush Curls', '30000', 7, '33.jpg', '<p>sssssssssssssssssssssssssssss</p>', 'Double Drawn', 'published', 'p16', '2019-09-06 16:14:42'),
(17, 'Blessing', 4, 'Brazilian Hair', '15000', 2, '5.jpg', '<p>qqqqqqqqqqqqqqqqqqqqqqqqqq</p>', 'Lush Curls', 'published', 'p17', '2019-09-06 16:16:05'),
(18, 'Blessing', 5, 'Premium Kinky Straight', '120000', 9, '1.jpg', '<p>ddddddddddddddddddddd</p>', 'Lush Curls', 'published', 'p18', '2019-09-06 16:23:52'),
(20, 'Blessing', 3, 'Brazilian Hairs', '45000', 1, '44.jpg', '<p>qqwqwqwqwqq</p>', 'nigeria, inches', 'published', 'p20', '2019-09-06 16:43:14'),
(21, 'Blessing', 2, 'Double Drawn', '120000', 2, '55.jpg', '<p>wweedeerdweddsdr</p>', 'Lush Curls', 'published', 'p21', '0000-00-00 00:00:00'),
(22, 'Blessing', 3, 'Lush Curls Hair', '30000', 3, '33.jpg', '<p>aaaasssdddd</p>', 'Lush Curls', 'published', 'p22', '0000-00-00 00:00:00'),
(23, 'Blessing', 2, 'Lush Curl', '20000', 8, '4.jpg', '<p>hgggggggggggggggggghhhhhhhhhhhhhh</p>', 'Coats, inches', 'published', 'p23', '2019-Sep-06 05:56'),
(25, 'Blessing', 1, 'Braids', '58000', 4, '11.jpg', '<p>aaaaaaaaaaaaa</p>', 'Brazilian Hair', 'published', 'p25', '2019-Sep-09 11:56 pm'),
(26, 'Blessing', 2, 'Russian Hair', '35000', 2, 'ban1.jpg', '<p>Russian hair</p>', 'Double Drawn', 'published', 'p26', '2019-Sep-15 07:14 am');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `review_name` varchar(255) NOT NULL,
  `review_text` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `review_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `review_name`, `review_text`, `status`, `review_date`) VALUES
(1, 'Ojajuni Blessing', 'To be honest your products are amazing!', 'approved', '2019-Sep-15 05:22 pm'),
(2, 'Chukwuneke Emmanuel', 'What a wonderful products you have.', 'approved', '2019-Sep-15 05:23 pm'),
(3, 'John Doe', 'Some of your products are fake.', 'unapproved', '2019-Sep-15 10:33 pm'),
(4, 'John Dean', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', 'approved', '2019-Sep-16 01:05 pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iknowwhoyouarevery2222',
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`, `token`) VALUES
(1, 'Blessing', '$2y$12$bnZi/xZqL/MZ1OCHpZiJKO4tbMmR1g.8yBrlkb3WDAud.49iNyJr6', 'Blessing', 'Ojajuni', 'hairline@gmail.com', '', 'admin', '$2y$10$iknowwhoyouarevery2222', ''),
(2, 'Emmanuel', '$2y$10$iknowwhoyouarevery222upMsgsqCrt6p9meo0NZn0F1zZ5yEtEM.', 'Emmanuel', 'Chukwuneke', 'demo1@yahoo.com', '', '', '$2y$10$iknowwhoyouarevery2222', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, '8ocfriam4cj5b6ruqdghcublsa', 1566109416),
(2, 'dl7jqq93muut0a9kgkfvq25ck4', 1566109323),
(3, 'b1dr106ricg847af22jcbumap4', 1566162783),
(4, 'o8cofmckeb78bq8qkr1et5t8rp', 1566156942),
(5, 'sl5dqbg5ig2bkshmt9te1ujubs', 1566221164),
(6, '34d301fqn746nsjvt0lao8qc8e', 1566251066),
(7, 'jvhpcar4mpnhebs9t9ccki3jcn', 1566259520),
(8, '5q3ko2be1vpb4b758k6cd8k18f', 1566282418),
(9, 'kvm368ahsogu8qhdi096t84pqd', 1566319687),
(10, 'egpco129504hc5doa4dh801de7', 1566334831),
(11, '41472ea8hir0puev78it9pdpg3', 1566413544),
(12, 'b87kron6rj2llvgtrg91eucqe3', 1566474842),
(13, 'dprm8o91um0c302s35tjbsja6a', 1566494065),
(14, 'qints4ncb6rbdrcbq49det3vr3', 1566576222),
(15, 'dltdd95vuipk1b3ol1hs3n3a56', 1566577606),
(16, 'd57eg3vnj42cbe8dj234h516ll', 1566586279),
(17, '7amlbebo4fd2jpdobc7tt28em6', 1566759183),
(18, 'ag6d3dbqesnookikdrv2g3o70t', 1566850929),
(19, '6ml60rtnbs24i7o0g8ab85kaq5', 1567080467),
(20, 'fmnj914ubko3j3l3ev0s50e7uj', 1567513890),
(21, 'gfi7cfgpm1063o90icef957s0g', 1567786011),
(22, 'l4pr738gkp4nsm62tb8d6tk4ns', 1567800660),
(23, '7niukdnbn1cg88an9rpjfctv6e', 1568010145),
(24, '9ju152oukj6edp55d1eulcfo5a', 1568066923),
(25, 'ieo7eg8fkj2578fsopl2p27q56', 1568066665),
(26, 'k7gsu23fv9gu48d6fj5qbr7ma0', 1568115186),
(27, 'b84ju7m72v03j2jgbnms3j44f9', 1568146859),
(28, '78m1bnca7aun0jpsm2c38h4l6u', 1568229441),
(29, 'iic8a7nh769i5bd45g6itmasrl', 1568466450),
(30, 'ih3n96p69fi4djq8tb778nav9d', 1568492292),
(31, '7bll1kt92jan53v66n7180d9u5', 1568525726),
(32, '8jkp7n11q19h1d9s2621ik65o5', 1568561055),
(33, '90eot6vquan1ssum7p86hbp1sf', 1568632113);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_account_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL DEFAULT '$2y$10$iknowwhoyouarevery2222'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_account_id`, `fname`, `username`, `email`, `password`, `salt`) VALUES
(1, 'Ojajuni Blessing', 'Blessing', 'hairline@gmail.com', '$1$uZtqXWGf$5j5nHnXe6zA3APNr64JSg/', '$2y$10$iknowwhoyouarevery2222'),
(2, 'Andrew Sunday', 'Sunday', 'sunday@gmail.com', '$2y$10$iknowwhoyouarevery222uDgdwLwbEvbmNSmqyNSPHD/T9j3VmjWC', '$2y$10$iknowwhoyouarevery2222'),
(3, '', '', '', '$2y$10$iknowwhoyouarevery222uM.AwyhNsyiKZYLC7r0ARWIsZMUcc4.y', '$2y$10$iknowwhoyouarevery2222'),
(4, '', '', '', '$2y$10$iknowwhoyouarevery222uM.AwyhNsyiKZYLC7r0ARWIsZMUcc4.y', '$2y$10$iknowwhoyouarevery2222'),
(5, 'John Doe', 'John', 'john@gmail.com', '$2y$10$iknowwhoyouarevery222uRKcMT6TOdfgrkas2Ee1mMbsDq8LDnpS', '$2y$10$iknowwhoyouarevery2222'),
(6, 'a', 'a', 'a', '$2y$10$iknowwhoyouarevery222uBAmX4/zvOyqlP0P00dFdi.lsyqbrkDW', '$2y$10$iknowwhoyouarevery2222'),
(7, 'Ojajuni Blessing', 'Blessing', 'hairlines@gmail.com', '$2y$10$iknowwhoyouarevery222uJe81wnB/BBtu7.Se4cJvyJGxlfLVcR2', '$2y$10$iknowwhoyouarevery2222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
