-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 09:40 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mecze`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mecz`
--

CREATE TABLE `mecz` (
  `id_mecz` int(11) NOT NULL,
  `gospodarz` text NOT NULL,
  `gosc` text NOT NULL,
  `liga` text NOT NULL,
  `kasa` int(11) NOT NULL,
  `podatek` int(11) NOT NULL,
  `data` date NOT NULL,
  `glowny` text NOT NULL,
  `numer_meczu` int(6) DEFAULT NULL,
  `delegacja` text NOT NULL,
  `zaplacone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mecz`
--

INSERT INTO `mecz` (`id_mecz`, `gospodarz`, `gosc`, `liga`, `kasa`, `podatek`, `data`, `glowny`, `numer_meczu`, `delegacja`, `zaplacone`) VALUES
(1, 'Lotnik Jeżów Sudecki', 'Apis Jędrzychowice', 'okręgówka', 193, 21, '2024-08-10', 'Krystian Ołota', NULL, 'edelegacja', 'T'),
(2, 'Victoria Jelenia Góra', 'Chrobry Nowogrodziec', 'okręgówka', 193, 21, '2024-08-17', 'Maciej Kwiecien', NULL, 'delegacja', 'T'),
(3, 'Miłoszów', 'Przyszłość Dłużyna', 'B Główny', 159, 13, '2024-08-18', 'ja', NULL, 'delegacja', 'T'),
(4, 'Stare Jaroszowice', 'Leśnik Osiecznica', 'A Asystent', 139, 15, '2024-08-18', 'Sławomir Wydysz', NULL, 'edelegacja', 'T'),
(5, 'BKS Bolesławiec', 'Bielawianka Bielawa', 'Junior Starszy Asystent Wojewódzka', 134, 14, '2024-08-20', 'Piotr Bajer', NULL, 'delegacja', 'T'),
(6, 'LKS Mierzwin', 'Sparta Zebrzydowa', 'A Asystent', 139, 15, '2024-08-23', 'Piotr Bajer', NULL, 'edelegacja', 'T'),
(7, 'LZS Kościelnik', 'Victoria Jelenia Góra', 'okręgówka', 193, 21, '2024-08-24', 'Kacper Kłobut', NULL, 'delegacja', 'T'),
(8, 'LZS Nowa', 'Leśnik Osiecznica', 'A Główny', 179, 19, '2024-08-25', 'ja', NULL, 'edelegacja', 'T'),
(9, 'KS Kotliska', 'Orzeł Gościszów', 'B Asystent', 119, 13, '2024-08-25', 'Filip Grzesiak', NULL, 'edelegacja', 'T'),
(10, 'Dąbrowa Bolesławiecka', 'Granica Bogatynia', 'B Asystent', 119, 13, '2024-08-28', 'Maciej Michałeczko', NULL, 'edelegacja', 'T'),
(11, 'kolonia Bolesławiec', 'Majdan Bolesławice', 'Młodzik', 80, 7, '2024-08-31', 'ja', NULL, 'delegacja', 'T'),
(12, 'Leśnik Osiecznica', 'Łużyce Lubań', 'junior młodszy Asystent', 84, 9, '2024-08-31', 'Alojzy Matejewicz', NULL, 'delegacja', 'T'),
(13, 'Gromadka', 'Kraśnik', 'B Główny', 159, 13, '2024-09-01', 'ja', NULL, 'delegacja', 'T'),
(14, 'Victoria Ruszów', 'LKS Mierzwin', 'A Asystent', 139, 15, '2024-09-01', 'Konrad Małachowski', NULL, 'edelegacja', 'T'),
(15, 'kolonia Bolesławiec', 'Łużyce Lubań', 'Młodzik', 80, 7, '2024-09-07', 'ja', NULL, 'delegacja', 'T'),
(16, 'WKS Żarki Średnie', 'Czarni Lwówek', 'A Asystent', 139, 15, '2024-09-07', 'Marcin Zapiór', NULL, 'edelegacja', 'T'),
(17, 'LKS Mierzwin', 'Zjednoczeni Nowogrodziec', 'A Główny', 179, 19, '2024-09-08', 'ja', NULL, 'edelegacja', 'T'),
(18, 'GKS Raciborowice', 'Kamienna Góra', 'okręgówka', 193, 21, '2024-09-08', 'Tomasz Sobol', NULL, 'delegacja', 'T'),
(19, 'kolonia Bolesławiec', 'Leśnik Osiecznica', 'Młodzik', 80, 7, '2024-09-09', 'ja', NULL, 'delegacja', 'T'),
(20, 'Sparta Zebrzydowa', 'Piast Wykroty', 'Młodzik', 80, 7, '2024-09-12', 'ja', NULL, 'delegacja', 'T'),
(21, 'Gryf Gryfów', 'KS Łomnica', 'okręgówka', 99, 11, '2024-09-14', 'Maciej Kwiecien', NULL, 'edelegacja', 'T'),
(22, 'GKS Iwiny', 'Leśnik Osiecznica', 'junior młodszy Główny', 109, 12, '2024-09-18', 'ja', NULL, 'edelegacja', 'T'),
(23, 'Łużyce Lubań', 'BKS Bolesławiec', 'Trampkarz Wojewódzka Główny', 74, 11, '2024-09-20', 'ja', NULL, 'delegacja', 'T'),
(24, 'Łużyce Lubań', 'Chrobry Nowogrodziec', 'O juniorów Asystent', 94, 10, '2024-09-20', 'Paweł Jaśkiewicz', NULL, 'delegacja', 'T'),
(25, 'kolonia Bolesławiec', 'Sparta Zebrzydowa', 'Młodzik', 64, 7, '2024-09-21', 'ja', NULL, 'delegacja', 'T'),
(26, 'kolonia Bolesławiec', 'ŁUŻYCKA AKADEMIA SPORTU', 'Trampkarz', 90, 8, '2024-09-21', 'ja', NULL, 'delegacja', 'T'),
(27, 'kolonia Bolesławiec', 'Stare Jaroszowice', 'A Asystent', 139, 15, '2024-09-21', 'Aneta Bargiel', NULL, 'delegacja', 'T'),
(28, 'BKS Bolesławiec', 'Leśnik Osiecznica', 'A Asystent', 139, 15, '2024-09-22', 'Maciej Michałeczko', NULL, 'delegacja', 'T'),
(29, 'Górnik Węgliniec', 'LKS Ocice', 'A Główny', 179, 19, '2024-09-22', 'ja', NULL, 'edelegacja', 'T'),
(30, 'Majdan Bolesławice', 'Chrobry Głogów', 'Trampkarz Wojewódzka Główny', 99, 11, '2024-09-25', 'ja', NULL, 'edelegacja', 'T'),
(31, 'Bielawiank Bielawa', 'Moto-Jelcz Oława', 'IV Liga', 219, 23, '2024-09-28', 'Konrad Małachowski', NULL, 'edelegacja', 'T'),
(32, 'Czerwona Woda', 'Victoria Ruszów', 'A Główny', 179, 19, '2024-09-29', 'ja', NULL, 'delegacja', 'T'),
(33, 'Piast Wykrot', 'Znicz Kruszyn', 'B Asystent', 119, 13, '2024-09-29', 'Paweł Jaśkiewicz', NULL, 'delegacja', 'T'),
(34, 'Miedź Legnica', 'Śląsk Wrocław', 'CLJ U17', 226, 23, '2024-10-02', 'Konrad Małachowski', NULL, 'edelegacja', 'T'),
(35, 'Hutnik Pieńsk', 'Granica Bogatynia', 'okręgówka', 193, 21, '2024-10-02', 'Sobol', NULL, 'edelegacja', 'T'),
(36, 'Victoria Ruszów', 'Gks Tomaszów', 'A Asystent', 139, 15, '2024-10-05', 'Maciej Michałeczko', NULL, 'edelegacja', 'T'),
(37, 'Warta Bolesławiecka', 'BKS Bolesławiec', 'A Asystent', 139, 15, '2024-10-06', 'Sławomir Wydysz', NULL, 'edelegacja', 'T'),
(38, 'Korona Radostów', 'Studniska Błękitni', 'A Główny', 179, 19, '2024-10-06', 'ja', NULL, 'edelegacja', 'T'),
(39, 'FA', 'BKS Bolesławiec', 'Młodzik', 80, 7, '2024-10-10', 'ja', NULL, 'edelegacja', 'T'),
(40, 'Majdan Bolesławice', 'Karkonosze Jelenia Góra', 'Trampkarz Wojewódzka Główny', 99, 11, '2024-10-12', 'ja', NULL, 'edelegacja', 'T'),
(41, 'Warta Bolesławiecka', 'kolonia Bolesławiec', 'A Główny', 179, 19, '2024-10-12', 'ja', NULL, 'edelegacja', 'T'),
(42, 'KS Kotliska', 'KS Milików', 'B Asystent', 119, 13, '2024-10-13', 'Marcin Zapiór', NULL, 'delegacja', 'T'),
(43, 'Granit Gierałtów', 'Sudety Giebułtów', 'A Asystent', 139, 15, '2024-10-13', 'Filip Grzesiak', NULL, 'delegacja', 'T'),
(44, 'kolonia Bolesławiec', 'Łużyce Lubań', 'O juniorów Główny', 124, 13, '2024-10-16', 'ja', NULL, 'delegacja', 'T'),
(45, 'kolonia Bolesławiec', 'Hutnik Pieńsk', 'Trampkarz', 90, 8, '2024-10-17', 'ja', NULL, 'delegacja', 'T'),
(46, 'BKS Bolesławiec', 'Górnik Polkowice', 'Junior Starszy Asystent Wojewódzka', 169, 18, '2024-10-19', 'ja', NULL, 'edelegacja', 'T'),
(47, 'Pogoń Świerzawa', 'Hutnik Pieńsk', 'okręgówka', 193, 21, '2024-10-19', 'Maciej Kwiecien', NULL, 'edelegacja', 'T'),
(48, 'Nysa Zgorzelec', 'Granica Miłoszów', 'B Asystent', 119, 13, '2024-10-20', 'Paweł Jaśkiewicz', NULL, 'delegacja', 'T'),
(49, 'Korona Radostów', 'WKS Żarki Średnie', 'A Asystent', 139, 15, '2024-10-20', 'Filip Grzesiak', NULL, 'edelegacja', 'T'),
(50, 'BKS Bolesławiec', 'Górnik Polkowice', 'Trampkarz Wojewódzka Główny', 99, 11, '2024-10-26', 'ja', NULL, 'edelegacja', 'T'),
(51, 'Błękitni Studniska', 'Sudety Giebułtów', 'A Asystent', 139, 15, '2024-10-26', 'Krystian Ołota', NULL, 'delegacja', 'T'),
(52, 'Dąbrowa Bolesławiecka', 'Majdan Bolesławice', 'B Asystent', 119, 13, '2024-10-27', 'Sławomir Wydysz', NULL, 'delegacja', 'T'),
(53, 'KS Milików', 'Legend Squad Radogoszcz', 'B Główny', 159, 13, '2024-10-27', 'ja', NULL, 'delegacja', 'T'),
(54, 'kolonia Bolesławiec', 'Gks Tomaszów', 'Młodzik', 80, 7, '2024-10-28', 'ja', NULL, 'delegacja', 'T'),
(55, 'Nysa Zgorzelec', 'Gryf Gryfów', 'okręgówka', 193, 21, '2024-11-02', 'Aneta Bargiel', NULL, 'delegacja', 'T'),
(56, 'Apis Jędrzychowice', 'KS Łomnica', 'okręgówka', 193, 21, '2024-11-03', 'Konrad Małachowski', NULL, 'delegacja', 'T'),
(57, 'Łużyce Lubań', 'Błękitni Studniska', 'A Główny', 179, 19, '2024-11-03', 'ja', NULL, 'delegacja', 'T'),
(123, 'Korona Radostów', 'Korona Radostów', 'Młodzik', 80, 8, '2024-11-09', 'Ja', 4113650, 'edelegacja', 'T'),
(124, 'LKS Ocice', 'Piast Czerwona Woda', 'A SG', 179, 19, '2024-11-09', 'Ja', 4043428, 'delegacja', 'T'),
(125, 'Miedź Legnica', 'Lechia Zielona Góra', 'CLJ U17', 226, 28, '2024-11-10', 'Konrad Małachowski', 4080183, 'edelegacja', 'T'),
(149, 'BKS Bolesławiec', 'Chrobry Głogów', 'LDJ Młodszych SG', 159, 17, '2024-11-17', 'Ja', NULL, 'edelegacja', 'T\r\n');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `mecz`
--
ALTER TABLE `mecz`
  ADD PRIMARY KEY (`id_mecz`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mecz`
--
ALTER TABLE `mecz`
  MODIFY `id_mecz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
