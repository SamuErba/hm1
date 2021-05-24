-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2021 alle 23:29
-- Versione del server: 10.4.16-MariaDB
-- Versione PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lspb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `accede`
--

CREATE TABLE `accede` (
  `id_pagamento` int(11) NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  `struttura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `effettua`
--

CREATE TABLE `effettua` (
  `prenotazione` int(11) NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `id_prenotazione` int(11) NOT NULL,
  `luogo` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `riceve`
--

CREATE TABLE `riceve` (
  `prenotazione` int(11) DEFAULT NULL,
  `struttura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `struttura`
--

CREATE TABLE `struttura` (
  `id_struttura` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `indirizzo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `accede`
--
ALTER TABLE `accede`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `new_acliente` (`cliente`),
  ADD KEY `new_astruttura` (`struttura`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indici per le tabelle `effettua`
--
ALTER TABLE `effettua`
  ADD PRIMARY KEY (`prenotazione`,`cliente`),
  ADD KEY `new_eprenotazione` (`prenotazione`),
  ADD KEY `new_ecliente` (`cliente`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`id_prenotazione`);

--
-- Indici per le tabelle `riceve`
--
ALTER TABLE `riceve`
  ADD KEY `new_rprenotazione` (`prenotazione`),
  ADD KEY `new_rstruttura` (`struttura`);

--
-- Indici per le tabelle `struttura`
--
ALTER TABLE `struttura`
  ADD PRIMARY KEY (`id_struttura`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `accede`
--
ALTER TABLE `accede`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `id_prenotazione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `struttura`
--
ALTER TABLE `struttura`
  MODIFY `id_struttura` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `accede`
--
ALTER TABLE `accede`
  ADD CONSTRAINT `accede_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `accede_ibfk_2` FOREIGN KEY (`struttura`) REFERENCES `struttura` (`id_struttura`);

--
-- Limiti per la tabella `effettua`
--
ALTER TABLE `effettua`
  ADD CONSTRAINT `effettua_ibfk_1` FOREIGN KEY (`prenotazione`) REFERENCES `prenotazione` (`id_prenotazione`),
  ADD CONSTRAINT `effettua_ibfk_2` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limiti per la tabella `riceve`
--
ALTER TABLE `riceve`
  ADD CONSTRAINT `riceve_ibfk_1` FOREIGN KEY (`prenotazione`) REFERENCES `prenotazione` (`id_prenotazione`),
  ADD CONSTRAINT `riceve_ibfk_2` FOREIGN KEY (`struttura`) REFERENCES `struttura` (`id_struttura`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
