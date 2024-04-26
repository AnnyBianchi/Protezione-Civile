-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Feb 23, 2024 alle 11:55
-- Versione del server: 8.0.18
-- Versione PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `protezione_civile_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `citta`
--

CREATE TABLE `citta` (
  `ID_Citta` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `cittadini`
--

CREATE TABLE `cittadini` (
  `ID_Cittadino` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `e-mailPersonale` varchar(30) NOT NULL,
  `telefono` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `confermasegnalazioni`
--

CREATE TABLE `confermasegnalazioni` (
  `ID_Conferma` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `id_Operatore` int(11) NOT NULL,
  `id_Segnalazione` int(11) NOT NULL,
  `id_Idrante` int(11) DEFAULT NULL,
  `id_Defibrillatore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `corpi`
--

CREATE TABLE `corpi` (
  `ID_Corpo` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `e-mailCorpo` varchar(40) NOT NULL,
  `numeroTelefono` int(15) NOT NULL,
  `nominativoReferente` varchar(40) NOT NULL,
  `viaSede` varchar(30) NOT NULL,
  `civicoSede` int(11) NOT NULL,
  `id_CittaSede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `defibrillatori`
--

CREATE TABLE `defibrillatori` (
  `ID_Defibrillatore` int(11) NOT NULL,
  `stato` int(2) NOT NULL,
  `descrizione` varchar(150) NOT NULL,
  `dataEliminazione` datetime DEFAULT NULL,
  `domestico` int(2) NOT NULL,
  `coordinataX` varchar(20) NOT NULL,
  `coordinataY` varchar(20) NOT NULL,
  `id_citta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `foto`
--

CREATE TABLE `foto` (
  `ID_Foto` int(11) NOT NULL,
  `descrizione` varchar(150) NOT NULL,
  `data` datetime NOT NULL,
  `ora` time NOT NULL,
  `id_Segnalazione` int(11) DEFAULT NULL,
  `id_Idrante` int(11) DEFAULT NULL,
  `id_Defibrillatore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `gestioni`
--

CREATE TABLE `gestioni` (
  `ID_Gestione` int(11) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `id_operatore` int(11) NOT NULL,
  `id_operazione` int(11) NOT NULL,
  `id_idrante` int(11) DEFAULT NULL,
  `id_defibrillatore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `idrante_attacco`
--

CREATE TABLE `idrante_attacco` (
  `ID_IdrAttacco` int(11) NOT NULL,
  `id_Idrante` int(11) NOT NULL,
  `id_Attacco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `idranti`
--

CREATE TABLE `idranti` (
  `ID_Idrante` int(11) NOT NULL,
  `id_stato` int(11) NOT NULL,
  `descrizione` varchar(150) NOT NULL,
  `accessibilità` varchar(40) NOT NULL,
  `dataEliminazione` datetime DEFAULT NULL,
  `coordinataX` varchar(20) NOT NULL,
  `coordinataY` varchar(20) NOT NULL,
  `id_citta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `operatori`
--

CREATE TABLE `operatori` (
  `ID_Operatore` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(100) NOT NULL,
  `tipologiaUtente` varchar(10) NOT NULL,
  `id_corpo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `segnalazioni`
--

CREATE TABLE `segnalazioni` (
  `ID_Segnalazione` int(11) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `descrizione` varchar(150) NOT NULL,
  `dataEliminazione` datetime DEFAULT NULL,
  `id_Cittadino` int(11) DEFAULT NULL,
  `id_Operatore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `stati`
--

CREATE TABLE `stati` (
  `ID_Stato` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `tipioperazioni`
--

CREATE TABLE `tipioperazioni` (
  `ID_Operazione` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descrizione` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `tipoattacco`
--

CREATE TABLE `tipoattacco` (
  `ID_Attacco` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descrizione` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `citta`
--
ALTER TABLE `citta`
  ADD PRIMARY KEY (`ID_Citta`);

--
-- Indici per le tabelle `cittadini`
--
ALTER TABLE `cittadini`
  ADD PRIMARY KEY (`ID_Cittadino`);

--
-- Indici per le tabelle `confermasegnalazioni`
--
ALTER TABLE `confermasegnalazioni`
  ADD PRIMARY KEY (`ID_Conferma`),
  ADD KEY `fk_operatore_conf_segnal` (`id_Operatore`),
  ADD KEY `fk_segnalazione` (`id_Segnalazione`),
  ADD KEY `fk_idrante_conf_segnal` (`id_Idrante`),
  ADD KEY `fk_defibillatore_conf_segnal` (`id_Defibrillatore`);

--
-- Indici per le tabelle `corpi`
--
ALTER TABLE `corpi`
  ADD PRIMARY KEY (`ID_Corpo`),
  ADD KEY `fk_citta` (`id_CittaSede`);

--
-- Indici per le tabelle `defibrillatori`
--
ALTER TABLE `defibrillatori`
  ADD PRIMARY KEY (`ID_Defibrillatore`),
  ADD KEY `fk_citta` (`id_citta`);

--
-- Indici per le tabelle `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`ID_Foto`),
  ADD KEY `fk_idrante_foto` (`id_Idrante`),
  ADD KEY `fk_segnalazione_foto` (`id_Segnalazione`),
  ADD KEY `fk_defibillatore_foto` (`id_Defibrillatore`);

--
-- Indici per le tabelle `gestioni`
--
ALTER TABLE `gestioni`
  ADD PRIMARY KEY (`ID_Gestione`),
  ADD KEY `fk_idrante` (`id_idrante`),
  ADD KEY `fk_operatore` (`id_operatore`),
  ADD KEY `fk_operazione` (`id_operazione`),
  ADD KEY `fk_defibillatore` (`id_defibrillatore`);

--
-- Indici per le tabelle `idrante_attacco`
--
ALTER TABLE `idrante_attacco`
  ADD PRIMARY KEY (`ID_IdrAttacco`),
  ADD KEY `fk_idrante_FK` (`id_Idrante`),
  ADD KEY `fk_attaccco_FK` (`id_Attacco`);

--
-- Indici per le tabelle `idranti`
--
ALTER TABLE `idranti`
  ADD PRIMARY KEY (`ID_Idrante`),
  ADD KEY `fk_stato` (`id_stato`),
  ADD KEY `fk_citta` (`id_citta`);

--
-- Indici per le tabelle `operatori`
--
ALTER TABLE `operatori`
  ADD PRIMARY KEY (`ID_Operatore`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_corpo` (`id_corpo`);

--
-- Indici per le tabelle `segnalazioni`
--
ALTER TABLE `segnalazioni`
  ADD PRIMARY KEY (`ID_Segnalazione`),
  ADD KEY `fk_cittadino` (`id_Cittadino`),
  ADD KEY `fk_operatore_segnal` (`id_Operatore`);

--
-- Indici per le tabelle `stati`
--
ALTER TABLE `stati`
  ADD PRIMARY KEY (`ID_Stato`);

--
-- Indici per le tabelle `tipioperazioni`
--
ALTER TABLE `tipioperazioni`
  ADD PRIMARY KEY (`ID_Operazione`);

--
-- Indici per le tabelle `tipoattacco`
--
ALTER TABLE `tipoattacco`
  ADD PRIMARY KEY (`ID_Attacco`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `citta`
--
ALTER TABLE `citta`
  MODIFY `ID_Citta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `cittadini`
--
ALTER TABLE `cittadini`
  MODIFY `ID_Cittadino` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `confermasegnalazioni`
--
ALTER TABLE `confermasegnalazioni`
  MODIFY `ID_Conferma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `corpi`
--
ALTER TABLE `corpi`
  MODIFY `ID_Corpo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `defibrillatori`
--
ALTER TABLE `defibrillatori`
  MODIFY `ID_Defibrillatore` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `foto`
--
ALTER TABLE `foto`
  MODIFY `ID_Foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `gestioni`
--
ALTER TABLE `gestioni`
  MODIFY `ID_Gestione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `idrante_attacco`
--
ALTER TABLE `idrante_attacco`
  MODIFY `ID_IdrAttacco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `idranti`
--
ALTER TABLE `idranti`
  MODIFY `ID_Idrante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `operatori`
--
ALTER TABLE `operatori`
  MODIFY `ID_Operatore` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `segnalazioni`
--
ALTER TABLE `segnalazioni`
  MODIFY `ID_Segnalazione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `stati`
--
ALTER TABLE `stati`
  MODIFY `ID_Stato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `tipioperazioni`
--
ALTER TABLE `tipioperazioni`
  MODIFY `ID_Operazione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `tipoattacco`
--
ALTER TABLE `tipoattacco`
  MODIFY `ID_Attacco` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `confermasegnalazioni`
--
ALTER TABLE `confermasegnalazioni`
  ADD CONSTRAINT `confermasegnalazioni_ibfk_1` FOREIGN KEY (`id_Idrante`) REFERENCES `idranti` (`ID_Idrante`),
  ADD CONSTRAINT `fk_defibillatore_conf_segnal` FOREIGN KEY (`id_Defibrillatore`) REFERENCES `defibrillatori` (`ID_Defibrillatore`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_operatore_conf_segnal` FOREIGN KEY (`id_Operatore`) REFERENCES `operatori` (`ID_Operatore`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_segnalazione` FOREIGN KEY (`id_Segnalazione`) REFERENCES `segnalazioni` (`ID_Segnalazione`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `corpi`
--
ALTER TABLE `corpi`
  ADD CONSTRAINT `fk_citta` FOREIGN KEY (`id_CittaSede`) REFERENCES `citta` (`ID_Citta`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `defibrillatori`
--
ALTER TABLE `defibrillatori`
  ADD CONSTRAINT `defibrillatori_ibfk_1` FOREIGN KEY (`id_citta`) REFERENCES `citta` (`ID_Citta`);

--
-- Limiti per la tabella `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `fk_defibillatore_foto` FOREIGN KEY (`id_Defibrillatore`) REFERENCES `defibrillatori` (`ID_Defibrillatore`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_idrante_foto` FOREIGN KEY (`id_Idrante`) REFERENCES `idranti` (`ID_Idrante`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_segnalazione_foto` FOREIGN KEY (`id_Segnalazione`) REFERENCES `segnalazioni` (`ID_Segnalazione`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `gestioni`
--
ALTER TABLE `gestioni`
  ADD CONSTRAINT `fk_defibillatore` FOREIGN KEY (`id_defibrillatore`) REFERENCES `defibrillatori` (`ID_Defibrillatore`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_idrante` FOREIGN KEY (`id_idrante`) REFERENCES `idranti` (`ID_Idrante`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_operatore` FOREIGN KEY (`id_operatore`) REFERENCES `operatori` (`ID_Operatore`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_operazione` FOREIGN KEY (`id_operazione`) REFERENCES `tipioperazioni` (`ID_Operazione`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `idrante_attacco`
--
ALTER TABLE `idrante_attacco`
  ADD CONSTRAINT `fk_attaccco_FK` FOREIGN KEY (`id_Attacco`) REFERENCES `tipoattacco` (`ID_Attacco`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_idrante_FK` FOREIGN KEY (`id_Idrante`) REFERENCES `idranti` (`ID_Idrante`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `idranti`
--
ALTER TABLE `idranti`
  ADD CONSTRAINT `idranti_ibfk_2` FOREIGN KEY (`id_stato`) REFERENCES `stati` (`ID_Stato`),
  ADD CONSTRAINT `idranti_ibfk_3` FOREIGN KEY (`id_citta`) REFERENCES `citta` (`ID_Citta`);

--
-- Limiti per la tabella `operatori`
--
ALTER TABLE `operatori`
  ADD CONSTRAINT `id_corpo` FOREIGN KEY (`id_corpo`) REFERENCES `corpi` (`ID_Corpo`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `segnalazioni`
--
ALTER TABLE `segnalazioni`
  ADD CONSTRAINT `fk_cittadino` FOREIGN KEY (`id_Cittadino`) REFERENCES `cittadini` (`ID_Cittadino`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_operatore_segnal` FOREIGN KEY (`id_Operatore`) REFERENCES `operatori` (`ID_Operatore`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
