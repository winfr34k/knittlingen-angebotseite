-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Okt 2014 um 19:35
-- Server Version: 5.6.20
-- PHP-Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `weihnacht`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `angebot`
--

CREATE TABLE IF NOT EXISTS `angebot` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `firmenId` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `angebot`
--

INSERT INTO `angebot` (`id`, `name`, `text`, `firmenId`, `active`) VALUES
(1, 'Rolltore extra günstig', 'NEU: Jetzt nur 3.099€/m!', 1, 1),
(2, 'Drehfügeltore im Doppelpack', 'yaddayadda\r\n\r\n3,50€', 1, 1),
(3, 'Spielekonsole', 'Xbox 1 im 10er Pack\r\nHeute nur 100€!', 2, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `firma`
--

CREATE TABLE IF NOT EXISTS `firma` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `firma`
--

INSERT INTO `firma` (`id`, `name`, `website`) VALUES
(1, 'Keppler GmbH', 'http://keppler-gmbh.de\r\n'),
(2, 'MRR PC-Service', 'http://mrauser.net');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angebot`
--
ALTER TABLE `angebot`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firma`
--
ALTER TABLE `firma`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angebot`
--
ALTER TABLE `angebot`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `firma`
--
ALTER TABLE `firma`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
