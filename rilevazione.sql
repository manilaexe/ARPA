-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 29, 2023 alle 01:01
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arpa`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `rilevazione`
--

CREATE TABLE `rilevazione` (
  `id` int(11) NOT NULL,
  `temp` float NOT NULL,
  `date_r` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sostanza` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `rilevazione`
--

INSERT INTO `rilevazione` (`id`, `temp`, `date_r`, `sostanza`) VALUES
(1, 25, '2023-05-28 23:01:11', 'CO2'),
(2, 13, '2023-05-28 23:01:11', 'CO2');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `rilevazione`
--
ALTER TABLE `rilevazione`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `rilevazione`
--
ALTER TABLE `rilevazione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
