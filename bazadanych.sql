-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lut 2021, 18:45
-- Wersja serwera: 10.3.27-MariaDB-31.cba+deb10u1
-- Wersja PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cardioapp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dbactivities`
--

CREATE TABLE `dbactivities` (
  `id` int(11) NOT NULL,
  `activityname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `sport` int(10) NOT NULL,
  `activitydate` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `userlimit` int(10) NOT NULL,
  `facility` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `city` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `dbactivities`
--

INSERT INTO `dbactivities` (`id`, `activityname`, `sport`, `activitydate`, `userlimit`, `facility`, `city`, `price`, `image`) VALUES
(4, 'Swimming lesson', 1, '04.04.2020', 3, 'Orka', 'Poznan', 50, 'swimming.jpeg'),
(2, 'Soccer lesson', 3, '20.03.2020', 11, 'INEA Stadium', 'Poznan', 350, 'ineastadion.jpeg'),
(3, 'Golfing class', 8, '05.04.2020', 5, 'Golfing Course', 'Trzaskowo', 500, 'golfing.jpeg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dbbooking`
--

CREATE TABLE `dbbooking` (
  `id` int(10) NOT NULL,
  `useremail` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `hallid` int(10) NOT NULL,
  `fromdate` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `todate` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status` int(10) NOT NULL,
  `message` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `dbbooking`
--

INSERT INTO `dbbooking` (`id`, `useremail`, `hallid`, `fromdate`, `todate`, `status`, `message`, `postdate`) VALUES
(6, 'jakubmieloch@gmail.com', 4, '14.01.2021', '15.01.2021', 0, 'ww', '2021-02-05 17:16:15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dbbookingactivities`
--

CREATE TABLE `dbbookingactivities` (
  `id` int(11) NOT NULL,
  `useremail` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `activityid` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `message` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `dbbookingactivities`
--

INSERT INTO `dbbookingactivities` (`id`, `useremail`, `activityid`, `status`, `message`) VALUES
(3, 'jakubmieloch@gmail.com', 4, 0, 'chce to'),
(4, 'jakubmieloch@gmail.com', 4, 0, 'nice');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dbcomments`
--

CREATE TABLE `dbcomments` (
  `id` int(11) NOT NULL,
  `useremail` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `hallid` int(50) NOT NULL,
  `message` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `rating` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `dbcomments`
--

INSERT INTO `dbcomments` (`id`, `useremail`, `hallid`, `message`, `rating`, `date`) VALUES
(1, 'jakubmieloch@gmail.com', 1, 'asdf', 1, '2021-01-20 15:21:11'),
(2, 'jakubmieloch@gmail.com', 3, 'dobre\r\n', 5, '2021-01-20 16:16:26'),
(3, 'jakubmieloch@gmail.com', 1, 'super basen pozdrawiam', 3, '2021-02-04 16:39:07'),
(4, 'jakubmieloch@gmail.com', 1, 'asdfg', 3, '2021-02-04 18:45:47'),
(5, 'jakubmieloch@gmail.com', 2, 'super obiekt', 5, '2021-02-05 16:36:34'),
(6, 'jakubmieloch@gmail.com', 4, 'super', 5, '2021-02-05 17:16:07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dbhall`
--

CREATE TABLE `dbhall` (
  `id` int(10) NOT NULL,
  `hallname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `sport` int(10) NOT NULL,
  `capacity` int(10) NOT NULL,
  `city` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `dbhall`
--

INSERT INTO `dbhall` (`id`, `hallname`, `sport`, `capacity`, `city`, `price`, `image`) VALUES
(4, 'Yoga Room', 7, 25, 'Poznan', 100, 'salajoga.jpg'),
(2, 'Tennis Court', 2, 4, 'Poznan', 200, 'salatenis.jpg'),
(5, 'Dance Room', 6, 20, 'Poznan', 100, 'saladance.jpg'),
(6, 'Fitness Room', 4, 20, 'Poznan', 100, 'salafitness.jpg'),
(7, 'Aerobics Room', 5, 15, 'Poznan', 75, 'salaaerobic.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dbsport`
--

CREATE TABLE `dbsport` (
  `id` int(10) NOT NULL,
  `sportname` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `dbsport`
--

INSERT INTO `dbsport` (`id`, `sportname`) VALUES
(1, 'Swimming'),
(2, 'Tennis'),
(3, 'Soccer'),
(4, 'Fitness'),
(5, 'Aerobik'),
(6, 'Dance'),
(7, 'Yoga'),
(8, 'Golf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dbusers`
--

CREATE TABLE `dbusers` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `mobile` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `dbusers`
--

INSERT INTO `dbusers` (`id`, `firstname`, `lastname`, `email`, `password`, `mobile`, `date`) VALUES
(3, 'Jakub', 'Mieloch', 'jakubmieloch@gmail.com', '42ca45a7cb88491031989120421b444e', '519455975', '2021-01-16 13:37:11'),
(12, 'Adam', 'Mieloch', 'adammieloch@gmail.com', '42ca45a7cb88491031989120421b444e', '519455973', '2021-01-19 16:56:57'),
(17, 'test', 'user', 'test@user.com', '098f6bcd4621d373cade4e832627b4f6', '4234564747', '2021-02-03 17:24:39'),
(14, 'adar', 'lareo', 'mobile@gamil.com', '912ec803b2ce49e4a541068d495ab570', '23142412', '2021-01-24 16:45:41'),
(15, 'rola', 'mola', 'tomek@adrse.com', '9cdfb439c7876e703e307864c9167a15', '123451256', '2021-01-24 16:46:44'),
(16, 'Jakub', 'Mieloch', 'jakubmieloc@asd.com', '202cb962ac59075b964b07152d234b70', '519455975', '2021-01-24 17:00:05');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `dbactivities`
--
ALTER TABLE `dbactivities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbbooking`
--
ALTER TABLE `dbbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbbookingactivities`
--
ALTER TABLE `dbbookingactivities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbcomments`
--
ALTER TABLE `dbcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbhall`
--
ALTER TABLE `dbhall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbsport`
--
ALTER TABLE `dbsport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbusers`
--
ALTER TABLE `dbusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dbactivities`
--
ALTER TABLE `dbactivities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `dbbooking`
--
ALTER TABLE `dbbooking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `dbbookingactivities`
--
ALTER TABLE `dbbookingactivities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `dbcomments`
--
ALTER TABLE `dbcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `dbhall`
--
ALTER TABLE `dbhall`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `dbsport`
--
ALTER TABLE `dbsport`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `dbusers`
--
ALTER TABLE `dbusers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
