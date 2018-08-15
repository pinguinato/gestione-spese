-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 09, 2018 alle 23:21
-- Versione del server: 10.1.32-MariaDB
-- Versione PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestione-spese`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `spesa`
--

CREATE TABLE `spesa` (
  `id` int(11) NOT NULL,
  `titolo_spesa` varchar(255) NOT NULL,
  `tipologia_spesa` varchar(255) NOT NULL,
  `data_pagamento_spesa` date NOT NULL,
  `data_scadenza_spesa` date NOT NULL,
  `autore_spesa` varchar(255) NOT NULL,
  `importo_spesa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `spesa`
--

INSERT INTO `spesa` (`id`, `titolo_spesa`, `tipologia_spesa`, `data_pagamento_spesa`, `data_scadenza_spesa`, `autore_spesa`, `importo_spesa`) VALUES
(1, 'Analisi del sangue', 'Pagamento ticket Larc', '2018-06-09', '2018-06-09', 'Roberto Gianotto', 19),
(2, 'Analisi del sangue', 'Pagamento ticket Larc', '2018-06-09', '2018-06-09', 'Stefania Vicentini', 13),
(3, 'Ecografia Addominale', 'Pagamento Ticket Larc', '2018-06-09', '2018-06-09', 'Roberto Gianotto', 110),
(4, 'Cena Bistekka', 'Cena alla griglieria', '2018-06-08', '2018-06-08', 'Roberto Gianotto', 42);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `spesa`
--
ALTER TABLE `spesa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `spesa`
--
ALTER TABLE `spesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
