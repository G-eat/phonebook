-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 11:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(774, 'Afghanistan'),
(775, 'Albania'),
(776, 'Algeria'),
(777, 'Andorra'),
(778, 'Angola'),
(779, 'Antigua and Barbuda'),
(780, 'Argentina'),
(781, 'Armenia'),
(782, 'Australia'),
(783, 'Austria'),
(784, 'Azerbaijan'),
(785, 'Bahamas'),
(786, 'Bahrain'),
(787, 'Bangladesh'),
(788, 'Barbados'),
(789, 'Belarus'),
(790, 'Belgium'),
(791, 'Belize'),
(792, 'Benin'),
(793, 'Bhutan'),
(794, 'Bolivia'),
(795, 'Bosnia and Herzegovina'),
(796, 'Botswana'),
(797, 'Brazil'),
(798, 'Brunei'),
(799, 'Bulgaria'),
(800, 'Burkina Faso'),
(801, 'Burundi'),
(802, 'Cabo Verde'),
(803, 'Cambodia'),
(804, 'Cameroon'),
(805, 'Canada'),
(806, 'Central African Republic'),
(807, 'Chad'),
(808, 'Chile'),
(809, 'China'),
(810, 'Colombia'),
(811, 'Comoros'),
(812, 'Congo (Congo-Brazzaville)'),
(813, 'Costa Rica'),
(814, 'Croatia'),
(815, 'Cuba'),
(816, 'Cyprus'),
(817, 'Czechia (Czech Republic)'),
(818, 'Democratic Republic of the Congo'),
(819, 'Denmark'),
(820, 'Djibouti'),
(821, 'Dominica'),
(822, 'Dominican Republic'),
(823, 'Ecuador'),
(824, 'Egypt'),
(825, 'El Salvador'),
(826, 'Equatorial Guinea'),
(827, 'Eritrea'),
(828, 'Estonia'),
(829, 'Ethiopia'),
(830, 'Fiji'),
(831, 'Finland'),
(832, 'France'),
(833, 'Gabon'),
(834, 'Gambia'),
(835, 'Georgia'),
(836, 'Germany'),
(837, 'Ghana'),
(838, 'Greece'),
(839, 'Grenada'),
(840, 'Guatemala'),
(841, 'Guinea'),
(842, 'Guinea-Bissau'),
(843, 'Guyana'),
(844, 'Haiti'),
(845, 'Holy See'),
(846, 'Honduras'),
(847, 'Hungary'),
(848, 'Iceland'),
(849, 'India'),
(850, 'Indonesia'),
(851, 'Iran'),
(852, 'Iraq'),
(853, 'Ireland'),
(854, 'Israel'),
(855, 'Italy'),
(856, 'Jamaica'),
(857, 'Japan'),
(858, 'Jordan'),
(859, 'Kazakhstan'),
(860, 'Kenya'),
(861, 'Kiribati'),
(862, 'Kuwait'),
(863, 'Kyrgyzstan'),
(864, 'Laos'),
(865, 'Latvia'),
(866, 'Lebanon'),
(867, 'Lesotho'),
(868, 'Liberia'),
(869, 'Libya'),
(870, 'Liechtenstein'),
(871, 'Lithuania'),
(872, 'Luxembourg'),
(873, 'Madagascar'),
(874, 'Malawi'),
(875, 'Malaysia'),
(876, 'Maldives'),
(877, 'Mali'),
(878, 'Malta'),
(879, 'Marshall Islands'),
(880, 'Mauritania'),
(881, 'Mauritius'),
(882, 'Mexico'),
(883, 'Micronesia'),
(884, 'Moldova'),
(885, 'Monaco'),
(886, 'Mongolia'),
(887, 'Montenegro'),
(888, 'Morocco'),
(889, 'Mozambique'),
(890, 'Myanmar (formerly Burma)'),
(891, 'Namibia'),
(892, 'Nauru'),
(893, 'Nepal'),
(894, 'Netherlands'),
(895, 'New Zealand'),
(896, 'Nicaragua'),
(897, 'Niger'),
(898, 'Nigeria'),
(899, 'North Korea'),
(900, 'North Macedonia'),
(901, 'Norway'),
(902, 'Oman'),
(903, 'Pakistan'),
(904, 'Palau'),
(905, 'Palestine State'),
(906, 'Panama'),
(907, 'Papua New Guinea'),
(908, 'Paraguay'),
(909, 'Peru'),
(910, 'Philippines'),
(911, 'Poland'),
(912, 'Portugal'),
(913, 'Qatar'),
(914, 'Romania'),
(915, 'Russia'),
(916, 'Rwanda'),
(917, 'Saint Kitts and Nevis'),
(918, 'Saint Lucia'),
(919, 'Saint Vincent and the Grenadines'),
(920, 'Samoa'),
(921, 'San Marino'),
(922, 'Sao Tome and Principe'),
(923, 'Saudi Arabia'),
(924, 'Senegal'),
(925, 'Serbia'),
(926, 'Seychelles'),
(927, 'Sierra Leone'),
(928, 'Singapore'),
(929, 'Slovakia'),
(930, 'Slovenia'),
(931, 'Solomon Islands'),
(932, 'Somalia'),
(933, 'South Africa'),
(934, 'South Korea'),
(935, 'South Sudan'),
(936, 'Spain'),
(937, 'Sri Lanka'),
(938, 'Sudan'),
(939, 'Suriname'),
(940, 'Sweden'),
(941, 'Switzerland'),
(942, 'Syria'),
(943, 'Tajikistan'),
(944, 'Tanzania'),
(945, 'Thailand'),
(946, 'Timor-Leste'),
(947, 'Togo'),
(948, 'Tonga'),
(949, 'Trinidad and Tobago'),
(950, 'Tunisia'),
(951, 'Turkey'),
(952, 'Turkmenistan'),
(953, 'Tuvalu'),
(954, 'Uganda'),
(955, 'Ukraine'),
(956, 'United Arab Emirates'),
(957, 'United Kingdom'),
(958, 'United States of America'),
(959, 'Uruguay'),
(960, 'Uzbekistan'),
(961, 'Vanuatu'),
(962, 'Venezuela'),
(963, 'Vietnam'),
(964, 'Yemen'),
(965, 'Zambia'),
(966, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`, `user_id`, `is_public`) VALUES
(53, 'test@gmail.com', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `phone`, `user_id`, `is_public`) VALUES
(177, '2313213', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `address`, `zip`, `country_id`, `is_public`) VALUES
(7, 'andi@gmail.com', '$2y$10$ql0jIQRP4UrBMleqd0ADDu4nnwtc8Vyf3wFeeOSkDNsN.dd9aRzcO', 'andi1', 'surname1', 'tedasdas', 'asddasd', 783, 1),
(8, 'andi2@gmail.com', '$2y$10$ql0jIQRP4UrBMleqd0ADDu4nnwtc8Vyf3wFeeOSkDNsN.dd9aRzcO', 'andi2', 'surname2', '', '', NULL, 1),
(9, 'andi3@gmail.com', '$2y$10$ql0jIQRP4UrBMleqd0ADDu4nnwtc8Vyf3wFeeOSkDNsN.dd9aRzcO', 'andi3', 'surname3', '', '', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`user_id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD KEY `country` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=967;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `user_email` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
