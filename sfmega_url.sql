-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 09 Lut 2020, 05:06
-- Wersja serwera: 10.2.30-MariaDB-cll-lve
-- Wersja PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sfmega_url`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `SkroconeLinki`
--

CREATE TABLE `SkroconeLinki` (
  `Id` int(255) NOT NULL,
  `LicznikOdwiedzin` int(255) NOT NULL DEFAULT 0,
  `Skrocony` char(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `URL` varchar(2048) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `LastUse` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `SkroconeLinki`
--

INSERT INTO `SkroconeLinki` (`Id`, `LicznikOdwiedzin`, `Skrocony`, `URL`, `LastUse`) VALUES
(1, 0, '6', 'https://wu.wsiz.rzeszow.pl/', '0000-00-00 00:00:00.000000');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `SkroconeLinki`
--
ALTER TABLE `SkroconeLinki`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `SkroconeLinki`
--
ALTER TABLE `SkroconeLinki`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
