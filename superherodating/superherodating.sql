-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 17. 11 2017 kl. 19:17:19
-- Serverversion: 10.1.21-MariaDB
-- PHP-version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superherodating`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `gift`
--

CREATE TABLE `gift` (
  `title` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `gift`
--

INSERT INTO `gift` (`title`, `sender`, `receiver`) VALUES
('Chocolate', 'Superman', 'Superwoman');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `liketable`
--

CREATE TABLE `liketable` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `liketable`
--

INSERT INTO `liketable` (`id`, `sender`, `receiver`) VALUES
(1, 'Batman', 'Spiderman');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `privatemessage`
--

CREATE TABLE `privatemessage` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `privatemessage`
--

INSERT INTO `privatemessage` (`id`, `sender`, `receiver`, `message`) VALUES
(3, 'Spiderman', 'Simon', 'Wanna learn how to climb like a spider??');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `profilecomment`
--

CREATE TABLE `profilecomment` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `profilecomment`
--

INSERT INTO `profilecomment` (`id`, `sender`, `receiver`, `message`) VALUES
(22, 'Superwoman', 'Batman', '	dj'),
(28, 'Simon', 'Batman', '	sdgsdggggggggggggggggggggggggggggggggggggg'),
(29, 'Simon', 'Batman', '	sdgsdgggggggggggggggggggggggggggagsdsdagasdgasdgasdgasdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdgdggggggggggg');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user`
--

CREATE TABLE `user` (
  `name` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `superpower` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `user`
--

INSERT INTO `user` (`name`, `age`, `location`, `superpower`) VALUES
('Batman', 42, 'Gotham, USA', 'Lots of money'),
('Nixon', 30, 'Gotham, USA', 'None'),
('Simon', 25, 'Danmark', 'Helt normal '),
('Spiderman', 25, 'USA', 'Climbing walls and strong'),
('Superman', 40, 'USA', 'Super fast and strong'),
('Superwoman', 34, 'USA', 'Super fast and strong');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`title`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Indeks for tabel `liketable`
--
ALTER TABLE `liketable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Indeks for tabel `privatemessage`
--
ALTER TABLE `privatemessage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Indeks for tabel `profilecomment`
--
ALTER TABLE `profilecomment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiver` (`receiver`),
  ADD KEY `sender` (`sender`);

--
-- Indeks for tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`name`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `liketable`
--
ALTER TABLE `liketable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tilføj AUTO_INCREMENT i tabel `privatemessage`
--
ALTER TABLE `privatemessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tilføj AUTO_INCREMENT i tabel `profilecomment`
--
ALTER TABLE `profilecomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `gift`
--
ALTER TABLE `gift`
  ADD CONSTRAINT `gift_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gift_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `liketable`
--
ALTER TABLE `liketable`
  ADD CONSTRAINT `liketable_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liketable_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `privatemessage`
--
ALTER TABLE `privatemessage`
  ADD CONSTRAINT `privatemessage_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `privatemessage_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `profilecomment`
--
ALTER TABLE `profilecomment`
  ADD CONSTRAINT `profilecomment_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profilecomment_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `user` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
