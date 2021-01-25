-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2021 at 04:18 PM
-- Server version: 5.5.63-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sveak_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `scoring_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_data_processing` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `scoring_id`, `name`, `fname`, `email`, `phone`, `user_data_processing`) VALUES
(19, 19, 'Annetta Miller', 'Hackett', 'zemlak.adriana@hotmail.com', '+31963162572', 0),
(20, 20, 'Gerardo Walter', 'Bernhard', 'kuhlman.nicola@hotmail.com', '+21395518171', 0),
(21, 21, 'Hanna Hessel', 'Kutch', 'golden88@hotmail.com', '+43179283996', 1),
(22, 22, 'Aryanna Kunze', 'Macejkovic', 'antonetta29@gmail.com', '+46322419227', 1),
(23, 23, 'Ocie Becker', 'Grimes', 'parker.altenwerth@hotmail.com', '+55856485917', 0),
(24, 24, 'Sam Wilkinson MD', 'Denesik', 'dritchie@gmail.com', '+91266097366', 1),
(25, 25, 'Miss Anya Emmerich', 'Bailey', 'julianne.ruecker@yahoo.com', '+90679961997', 0),
(26, 26, 'Dr. Enid Jaskolski II', 'Osinski', 'ebert.rubie@yahoo.com', '+90397831511', 1),
(27, 27, 'Kelly Farrell II', 'Beier', 'salma94@hotmail.com', '+58492729973', 0),
(28, 28, 'Kevon Collins', 'Adams', 'doconner@gmail.com', '+36074939141', 1),
(29, 29, 'Isabella Doyle DVM', 'Torp', 'trenton.pfannerstill@hotmail.com', '+13408989898', 0),
(30, 30, 'Mr. Toby Crist Sr.', 'Block', 'crystel33@yahoo.com', '+42520952243', 0),
(31, 31, 'Greyson Murphy', 'Bernhard', 'baby.west@hotmail.com', '+83487647184', 1),
(32, 32, 'Mr. Milan Beier DDS', 'Goodwin', 'keshaun.predovic@yahoo.com', '+59470081411', 1),
(33, 33, 'Landen Abernathy', 'Bruen', 'oconnell.christa@yahoo.com', '+25973883624', 0),
(34, 34, 'Mrs. Ana Harber MD', 'Renner', 'abernathy.roderick@gmail.com', '+33032742394', 1),
(35, 35, 'Prof. Dejah Keeling', 'Armstrong', 'champlin.stephany@hotmail.com', '+70347367137', 1),
(36, 36, 'Michele Jast MD', 'Crona', 'denis94@yahoo.com', '+67290481150', 0),
(37, 37, 'Estella McCullough', 'Romaguera', 'vhaag@hotmail.com', '+51589861481', 1),
(38, 38, 'Chance Corwin', 'Schultz', 'sigmund.fisher@yahoo.com', '89992587459', 0),
(39, 39, 'Ms. Vergie Huels', 'Gleichner', 'orohan@yahoo.com', '+59059186024', 1),
(40, 40, 'Mr. Dock Cummings', 'Orn', 'wbotsford@hotmail.com', '+11478818634', 0),
(41, 41, 'Ceasar Welch', 'Towne', 'lyda.brakus@hotmail.com', '+34620336830', 0),
(42, 42, 'Dwight Douglas', 'Kessler', 'vince75@hotmail.com', '+35038728809', 1),
(43, 43, 'Donald Jakubowski PhD', 'Lemke', 'bartell.matilde@yahoo.com', '+21116418715', 1),
(44, 44, 'Bruce Borer', 'Ortiz', 'hope29@yahoo.com', '+11131544318', 1),
(45, 45, 'Kaley Yost', 'Christiansen', 'freddy26@gmail.com', '+17462783078', 1),
(46, 46, 'Rosalind Wolf', 'Marks', 'hermann.adonis@gmail.com', '+83745296118', 0),
(47, 47, 'Eveline Lynch', 'Parisian', 'thiel.katelin@yahoo.com', '+15562167651', 1),
(49, 49, 'Otho Hackett', 'Roberts', 'bgleichner@hotmail.com', '+78485733012', 1),
(50, 50, 'Rozella Brown', 'Ferry', 'larkin.jaquelin@gmail.com', '+12651213483', 1),
(51, 51, 'Michaela Howe', 'Maggio', 'sschoen@gmail.com', '+30521589098', 1),
(52, 52, 'Mr. Dino Kiehn MD', 'Roob', 'layne.cruickshank@yahoo.com', '+72107477722', 0),
(53, 53, 'Derrick Pagac', 'Turcotte', 'hailee.hilpert@gmail.com', '+18588048538', 0),
(54, 54, 'Domenico Farrell III', 'Considine', 'courtney27@gmail.com', '+91039348758', 1),
(55, 55, 'Thora Aufderhar', 'Lueilwitz', 'gusikowski.bradley@hotmail.com', '+53496743595', 0),
(56, 56, 'Prof. Felton Hane', 'Jacobs', 'ruben.mcdermott@gmail.com', '+10241421312', 1),
(57, 57, 'Dr. Eloy Bartell', 'Kling', 'judson.parisian@yahoo.com', '+40658301018', 1),
(58, 58, 'Mr. Trent Harber III', 'Bartoletti', 'roreilly@gmail.com', '+14435681445', 0),
(59, 59, 'Felton Klein', 'Konopelski', 'xcollier@hotmail.com', '+90745670700', 0),
(60, 60, 'Lucas McGlynn', 'Powlowski', 'sreinger@hotmail.com', '+73816116873', 1),
(61, 61, 'Makenzie Bednar', 'Lubowitz', 'horace.schulist@yahoo.com', '+52522732855', 1),
(62, 62, 'Darwin Raynor I', 'Altenwerth', 'yschamberger@hotmail.com', '+95455922085', 0),
(63, 63, 'Prof. Rocky Gutkowski', 'Franecki', 'rhyatt@hotmail.com', '+23918079374', 0),
(64, 64, 'Aylin Glover', 'Schuster', 'albin.rosenbaum@yahoo.com', '+51067435803', 0),
(65, 65, 'Abbey Ankunding', 'Haag', 'rosamond.carter@gmail.com', '+16234619907', 1),
(66, 66, 'Michael Green', 'Powlowski', 'wschultz@yahoo.com', '+30046693084', 1),
(67, 67, 'Colleen Senger IV', 'Mills', 'okeefe.kari@gmail.com', '+61683697696', 0),
(68, 68, 'Prof. Bertram Hettinger Jr.', 'Schoen', 'shanna.bartell@hotmail.com', '+88383162843', 1),
(69, 69, '2222222', '123333', '337@gmail.com', '89999908332', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210123072111', '2021-01-23 10:21:39', 1416);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `education` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `client_id`, `education`) VALUES
(58, 19, 'Special education'),
(59, 20, 'High education'),
(60, 21, 'Special education'),
(61, 22, 'Middle education'),
(62, 23, 'Special education'),
(63, 24, 'Middle education'),
(64, 25, 'Special education'),
(65, 26, 'Middle education'),
(66, 27, 'Special education'),
(67, 28, 'High education'),
(68, 29, 'Special education'),
(69, 30, 'Special education'),
(70, 31, 'Special education'),
(71, 32, 'Special education'),
(72, 33, 'High education'),
(73, 34, 'Middle education'),
(74, 35, 'Middle education'),
(75, 36, 'Special education'),
(76, 37, 'Special education'),
(78, 39, 'High education'),
(79, 40, 'High education'),
(80, 41, 'High education'),
(81, 42, 'Middle education'),
(82, 43, 'Middle education'),
(83, 44, 'Middle education'),
(84, 45, 'Special education'),
(85, 46, 'High education'),
(86, 47, 'Special education'),
(88, 49, 'Special education'),
(89, 50, 'High education'),
(90, 51, 'Special education'),
(91, 52, 'High education'),
(92, 53, 'High education'),
(93, 54, 'High education'),
(94, 55, 'Special education'),
(95, 56, 'Special education'),
(96, 57, 'Special education'),
(97, 58, 'Special education'),
(98, 59, 'Middle education'),
(99, 60, 'Middle education'),
(100, 61, 'High education'),
(101, 62, 'High education'),
(102, 63, 'Special education'),
(103, 64, 'Special education'),
(104, 65, 'High education'),
(105, 66, 'High education'),
(106, 67, 'Middle education'),
(107, 68, 'Special education'),
(110, 38, 'Middle education'),
(111, 69, 'High education'),
(112, 69, 'High education'),
(113, 69, 'High education');

-- --------------------------------------------------------

--
-- Table structure for table `scoring`
--

CREATE TABLE `scoring` (
  `id` int(11) NOT NULL,
  `balls` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scoring`
--

INSERT INTO `scoring` (`id`, `balls`) VALUES
(19, 26),
(20, 24),
(21, 14),
(22, 34),
(23, 21),
(24, 21),
(25, 13),
(26, 30),
(27, 33),
(28, 19),
(29, 18),
(30, 34),
(31, 31),
(32, 34),
(33, 22),
(34, 28),
(35, 33),
(36, 35),
(37, 17),
(38, 18),
(39, 20),
(40, 25),
(41, 14),
(42, 28),
(43, 29),
(44, 22),
(45, 10),
(46, 11),
(47, 16),
(49, 23),
(50, 13),
(51, 20),
(52, 14),
(53, 27),
(54, 14),
(55, 11),
(56, 35),
(57, 33),
(58, 35),
(59, 26),
(60, 32),
(61, 18),
(62, 16),
(63, 29),
(64, 13),
(65, 15),
(66, 12),
(67, 15),
(68, 30),
(69, 69);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C7440455E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_C7440455444F97DD` (`phone`),
  ADD UNIQUE KEY `UNIQ_C7440455DF2EDCBF` (`scoring_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DB0A5ED219EB6921` (`client_id`);

--
-- Indexes for table `scoring`
--
ALTER TABLE `scoring`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `scoring`
--
ALTER TABLE `scoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C7440455DF2EDCBF` FOREIGN KEY (`scoring_id`) REFERENCES `scoring` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `FK_DB0A5ED219EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
