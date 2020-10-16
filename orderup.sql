-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 01 Ιουν 2017 στις 19:59:28
-- Έκδοση διακομιστή: 10.1.13-MariaDB
-- Έκδοση PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `orderup`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orderinfo`
--

CREATE TABLE `orderinfo` (
  `orderID` int(20) NOT NULL,
  `orderDetails` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tableNumber` int(20) NOT NULL,
  `orderTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orderTotal` int(20) NOT NULL,
  `orderAccepted` tinyint(1) NOT NULL DEFAULT '0',
  `orderPaid` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `prodinfo`
--

CREATE TABLE `prodinfo` (
  `prodID` int(10) NOT NULL,
  `prodName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prodPrice` float NOT NULL,
  `prodDescr` longtext COLLATE utf8_unicode_ci NOT NULL,
  `prodCategory` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `tableinfo`
--

CREATE TABLE `tableinfo` (
  `tableID` int(20) NOT NULL,
  `tableNumber` int(20) NOT NULL,
  `tableCapacity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `userinfo`
--

CREATE TABLE `userinfo` (
  `ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `UserType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `userinfo`
--

INSERT INTO `userinfo` (`ID`, `Username`, `Password`, `UserType`) VALUES
(1, 'diaxeiristis', '123', 1),
(2, 'tamias', '123', 2),
(3, 'servitoros', '123', 3);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD PRIMARY KEY (`orderID`);

--
-- Ευρετήρια για πίνακα `prodinfo`
--
ALTER TABLE `prodinfo`
  ADD PRIMARY KEY (`prodID`);

--
-- Ευρετήρια για πίνακα `tableinfo`
--
ALTER TABLE `tableinfo`
  ADD PRIMARY KEY (`tableID`);

--
-- Ευρετήρια για πίνακα `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `orderinfo`
--
ALTER TABLE `orderinfo`
  MODIFY `orderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT για πίνακα `prodinfo`
--
ALTER TABLE `prodinfo`
  MODIFY `prodID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT για πίνακα `tableinfo`
--
ALTER TABLE `tableinfo`
  MODIFY `tableID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT για πίνακα `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
