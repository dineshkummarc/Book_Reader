-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/

-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booklibrary1`
--

-- --------------------------------------------------------

--
-- Table structure for table `booklist`
--

CREATE TABLE `booklist` (
  `book_id` int(8) NOT NULL,
  `book_name` varchar(60) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_rating` int(30) NOT NULL,
  `book_cover` longblob NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `book_genre` varchar(200) NOT NULL,
  `long_description` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booklist`
--

INSERT INTO `booklist` (`book_id`, `book_name`, `book_author`, `book_rating`, `book_cover`, `description`, `file`, `book_genre`, `long_description`, `created_at`) VALUES
(16, 'Me Before You', 'Jojo Moyes', 1241245, 0x3137333437363334, '&lt;b&gt;From the #1 New York Times bestselling author of The Giver of Stars, discover the love story that captured over 20 million hearts in Me Before You, After You, and Still Me.&lt;/b&gt;', '', 'Romance', '<b>From the #1 New York Times bestselling author of The Giver of Stars, discover the love story that captured over 20 million hearts in Me Before You, After You, and Still Me.</b><br>\r\n\r\nThey had nothing in common until love gave them everything to lose . . .<br>\r\n\r\nLouisa Clark is an ordinary girl living an exceedingly ordinary life—steady boyfriend, close family—who has barely been farther afield than their tiny village. She takes a badly needed job working for ex–Master of the Universe Will Traynor, who is wheelchair bound after an accident. Will has always lived a huge life—big deals, extreme sports, worldwide travel—and now he’s pretty sure he cannot live the way he is.<br>\r\n\r\nWill is acerbic, moody, bossy—but Lou refuses to treat him with kid gloves, and soon his happiness means more to her than she expected. When she learns that Will has shocking plans of his own, she sets out to show him that life is still worth living.<br>\r\n\r\nA Love Story for this generation and perfect for fans of John Green’s The Fault in Our Stars, Me Before You brings to life two people who couldn’t have less in common—a heartbreakingly romantic novel that asks, What do you do when making the person you love happy also means breaking your own heart?', '2021-05-12 20:59:16'),
(17, 'The Kite Runner', 'Khaled Hosseini', 2555023, 0x3131323936353233, 'The unforgettable, heartbreaking story of the unlikely friendship between a wealthy boy and the son of his father’s servant, The Kite Runner is a beautifully crafted novel set in a country that is in the process of being destroyed. It is about the power of reading, the price of betrayal, and the possibility of redemption; and an exploration of the power of fathers over son', '', 'Non-Fiction', 'The unforgettable, heartbreaking story of the unlikely friendship between a wealthy boy and the son of his father’s servant, The Kite Runner is a beautifully crafted novel set in a country that is in the process of being destroyed. It is about the power of reading, the price of betrayal, and the possibility of redemption; and an exploration of the power of fathers over sons—their love, their sacrifices, their lies.&lt;br&gt;&lt;br&gt;\r\n\r\nA sweeping story of family, love, and friendship told against the devastating backdrop of the history of Afghanistan over the last thirty years, The Kite Runner is an unusual and powerful novel that has become a beloved, one-of-a-kind classic.\r\n--khaledhosseini.com', '2021-05-12 21:05:29'),
(19, 'To Kill a Mockingbird', 'Harper Lee', 4784209, 0x32363537, 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. &quot;To Kill A Mockingbird&quot; became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.', '', 'fiction', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. &quot;To Kill A Mockingbird&quot; became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.\r\n\r\nCompassionate, dramatic, and deeply moving, &quot;To Kill A Mockingbird&quot; takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.', '2021-05-13 12:01:39'),
(21, 'Harry Potter and the Cursed Child: Parts One and Two', 'John Tiffany (Adaptation), Jack Thorne, J.K. Rowling', 765316, 0x32393035363038332e5f53593437355f, 'Based on an original new story by J.K. Rowling, Jack Thorne and John Tiffany, a new play by Jack Thorne, Harry Potter and the Cursed Child is the eighth story in the Harry Potter series and the first official Harry Potter story to be presented on stage. The play will receive its world premiere in London’s West End on July 30, 2016.', '', 'Fiction', 'Based on an original new story by J.K. Rowling, Jack Thorne and John Tiffany, a new play by Jack Thorne, Harry Potter and the Cursed Child is the eighth story in the Harry Potter series and the first official Harry Potter story to be presented on stage. The play will receive its world premiere in London’s West End on July 30, 2016.&lt;br&gt;&lt;br&gt;\r\n\r\nIt was always difficult being Harry Potter and it isn’t much easier now that he is an overworked employee of the Ministry of Magic, a husband and father of three school-age children.&lt;br&gt;&lt;br&gt;\r\n\r\nWhile Harry grapples with a past that refuses to stay where it belongs, his youngest son Albus must struggle with the weight of a family legacy he never wanted. As past and present fuse ominously, both father and son learn the uncomfortable truth: sometimes, darkness comes from unexpected places.', '2021-05-13 16:08:17'),
(22, 'A Walk to Remember', 'Nicholas Sparks', 702698, 0x77616c6b5f746f5f72656d656d626572, 'There was a time when the world was sweeter...when the women in Beaufort, North Carolina, wore dresses, and the men donned hats...when something happened to a seventeen-year-old boy that would change his life forever. Every April, when the wind blows in from the sea and mingles with the scent of lilacs, Landon Carter remembers his last year at Beaufort High. It was 1958,', '', 'Romance', 'There was a time when the world was sweeter...when the women in Beaufort, North Carolina, wore dresses, and the men donned hats...when something happened to a seventeen-year-old boy that would change his life forever. Every April, when the wind blows in from the sea and mingles with the scent of lilacs, Landon Carter remembers his last year at Beaufort High. It was 1958, and Landon had already dated a girl or two. He even swore that he had once been in love. Certainly the last person in town he thought he\'d fall for was Jamie Sullivan, the daughter of the town\'s Baptist minister. A quiet girl who always carried a Bible with her schoolbooks, Jamie seemed content living in a world apart from the other teens. She took care of her widowed father, rescued hurt animals, and helped out at the local orphanage. No boy had ever asked her out. Landon would never have dreamed of it. Then a twist of fate made Jamie his partner for the homecoming dance, and Landon Carter\'s life would never be the same. Being with Jamie would show him the depths of the human heart and lead him to a decision so stunning it would send him irrevocably on the road to manhood. No other author today touches our emotions more deeply than Nicholas Sparks.\r\nIlluminating both the strength and the gossamer fragility of our deepest emotions, his two New York Times bestsellers, The Notebook and Message in a Bottle, have established him as the leading author of today\'s most cherished love stories. Now, in A Walk to Remember, he tells a truly unforgettable story, one that glimmers with all of his magic, holding us spellbound-and reminding us that in life each of us may find one great love, the kind that changes everything...', '2021-05-13 16:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(8) UNSIGNED NOT NULL,
  `discussion_id` int(8) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL,
  `comment` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `discussion_id` int(8) UNSIGNED NOT NULL,
  `book_topic` varchar(60) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL,
  `comment` varchar(12000) NOT NULL,
  `updated_at` varchar(2000) NOT NULL,
  `created_at` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`discussion_id`, `book_topic`, `book_name`, `user_id`, `comment`, `updated_at`, `created_at`) VALUES
(41, 'Amir', 'Kite Runner', 75, 'Please give your opinion about amir\'s character..', '', 'September 1, 2021, 5:29 pm');

-- --------------------------------------------------------


-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `create_at`, `user_image`) VALUES
(75, 'Admin User', 'user@gmail.com', 'e66055e8e308770492a44bf16e875127', '2021-09-01 11:09:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_booklist`
--

CREATE TABLE `user_booklist` (
  `user_book_id` int(10) UNSIGNED NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `choice_list` varchar(800) NOT NULL,
  `book_id` int(8) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_booklist`
--

INSERT INTO `user_booklist` (`user_book_id`, `book_name`, `choice_list`, `book_id`, `user_id`) VALUES
(76, 'To Kill a Mockingbird', 'Want to Read', 19, 75),
(78, 'The Kite Runner', 'Read', 17, 75);

-- --------------------------------------------------------

--
-- Table structure for table `user_share_book`
--

CREATE TABLE `user_share_book` (
  `book_share_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL,
  `share_book_name` varchar(250) NOT NULL,
  `book_author` varchar(150) NOT NULL,
  `share_file` longblob NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_share_book`
--

INSERT INTO `user_share_book` (`book_share_id`, `user_id`, `share_book_name`, `book_author`, `share_file`, `size`) VALUES
(142, 75, 'Kite Runner', 'KHALED HOSSEINI ', 0x7468652d6b6974652d72756e6e65722e706466, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booklist`
--
ALTER TABLE `booklist`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_name` (`book_name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `discussion_id` (`discussion_id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`discussion_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_booklist`
--
ALTER TABLE `user_booklist`
  ADD PRIMARY KEY (`user_book_id`);

--
-- Indexes for table `user_share_book`
--
ALTER TABLE `user_share_book`
  ADD PRIMARY KEY (`book_share_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booklist`
--
ALTER TABLE `booklist`
  MODIFY `book_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `discussion_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `user_booklist`
--
ALTER TABLE `user_booklist`
  MODIFY `user_book_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `user_share_book`
--
ALTER TABLE `user_share_book`
  MODIFY `book_share_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`discussion_id`) REFERENCES `discussion` (`discussion_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_share_book`
--
ALTER TABLE `user_share_book`
  ADD CONSTRAINT `user_share_book_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
