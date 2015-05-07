-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Palvelin: localhost
-- Luontiaika: 07.05.2015 klo 17:40
-- Palvelimen versio: 5.5.41-MariaDB-1ubuntu0.14.04.1
-- PHP:n versio: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Tietokanta: `a1100331`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `merkki` varchar(255) NOT NULL,
  `rekisterinumero` varchar(255) NOT NULL,
  `moottorintilavuus` varchar(255) NOT NULL,
  `valmistusvuosi` varchar(255) NOT NULL,
  `lisatietoja` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Vedos taulusta `car`
--

INSERT INTO `car` (`id`, `merkki`, `rekisterinumero`, `moottorintilavuus`, `valmistusvuosi`, `lisatietoja`) VALUES
(1, 'Mazda', 'LRY-818', '2.3', '2007', 'Huippuhieno auto'),
(2, 'Opel', 'AZG-784', '2.2', '2001', 'Tämä auto oli minulla pisimpään'),
(3, 'Volkswagen', 'ASD-123', '1.3', '1995', 'Ensimmäinen autoni');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
