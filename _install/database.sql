-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2016 a las 16:05:25
-- Versión del servidor: 5.5.46-0ubuntu0.14.04.2
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mini`
--
/* Se elimina la base de datos si la hubiese */
DROP DATABASE IF EXISTS myMini;
/* Creacion de la base de datos */
CREATE DATABASE myMini character set utf8 collate utf8_general_ci;
/* Uso de la base de datos */
USE myMini;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
  `id_pregunta` int(10) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cuerpo` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `asunto`, `cuerpo`) VALUES
(1, 'Pregunta de prueba nº 1', '¿Esto es una prueba?'),
(2, 'Pregunta de prueba nº 2', '¿Y esto es otra?'),
(3, 'Quiero saber más. Es posible?', 'Si, si estudias mucho, mucho y mucho'),
(4, '¿Nueva Pregunta con Plates', 'Esta es una pregunta con el motor de Plates'),
(5, '¿Pregunta nº 6?', 'Esta es otra pregunta de ejemplo'),
(6, 'Un asunto cualquiera', 'Ejemplo del uso de Sesiones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` text COLLATE utf8_unicode_ci NOT NULL,
  `track` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `song`
--

INSERT INTO `song` (`id`, `artist`, `track`, `link`) VALUES
(1, 'Dena', 'Cash, Diamond Ring, Swimming Pools', 'http://www.youtube.com/watch?v=r4CDc9yCAqE'),
(2, 'Jessy Lanza', 'Kathy Lee', 'http://vimeo.com/73455369'),
(3, 'The Orwells', 'In my Bed (live)', 'http://www.youtube.com/watch?v=8tA_2qCGnmE'),
(4, 'L''Orange & Stik Figa', 'Smoke Rings', 'https://www.youtube.com/watch?v=Q5teohMyGEY'),
(5, 'Labyrinth Ear', 'Navy Light', 'http://www.youtube.com/watch?v=a9qKkG7NDu0'),
(6, 'Bon Hiver', 'Wolves (Kill them with Colour Remix)', 'http://www.youtube.com/watch?v=5GXAL5mzmyw'),
(7, 'Detachments', 'Circles (Martyn Remix)', 'http://www.youtube.com/watch?v=UzS7Gvn7jJ0'),
(8, 'Dillon & Dirk von Loetzow', 'Tip Tapping (Live at ZDF Aufnahmezustand)', 'https://www.youtube.com/watch?v=hbrOLsgu000'),
(9, 'Dillon', 'Contact Us (Live at ZDF Aufnahmezustand)', 'https://www.youtube.com/watch?v=E6WqTL2Up3Y'),
(10, 'Tricky', 'Hey Love (Promo Edit)', 'http://www.youtube.com/watch?v=OIsCGdW49OQ'),
(11, 'Compuphonic', 'Sunset feat. Marques Toliver (DJ T. Remix)', 'http://www.youtube.com/watch?v=Ue5ZWSK9r00'),
(12, 'Ludovico Einaudi', 'Divenire (live @ Royal Albert Hall London)', 'http://www.youtube.com/watch?v=X1DRDcGlSsE'),
(13, 'Maxxi Soundsystem', 'Regrets we have no use for (Radio1 Rip)', 'https://soundcloud.com/maxxisoundsystem/maxxi-soundsystem-ft-name-one'),
(14, 'Beirut', 'Nantes (Fredo & Thang Remix)', 'https://www.youtube.com/watch?v=ojV3oMAgGgU'),
(15, 'Buku', 'All Deez', 'http://www.youtube.com/watch?v=R0bN9JRIqig'),
(16, 'Pilocka Krach', 'Wild Pete', 'http://www.youtube.com/watch?v=4wChP_BEJ4s'),
(17, 'Mount Kimbie', 'Here to stray (live at Pitchfork Music Festival Paris)', 'http://www.youtube.com/watch?v=jecgI-zEgIg'),
(18, 'Kool Savas', 'King of Rap (2012) / Ein Wunder', 'http://www.youtube.com/watch?v=mTqc6UTG1eY&hd=1'),
(19, 'Chaim feat. Meital De Razon', 'Love Rehab (Original Mix)', 'http://www.youtube.com/watch?v=MJT1BbNFiGs'),
(20, 'Emika', 'Searching', 'http://www.youtube.com/watch?v=oscuSiHfbwo'),
(21, 'Emika', 'Sing to me', 'http://www.youtube.com/watch?v=k9sDBZm8pgk'),
(22, 'George Fitzgerald', 'Thinking of You', 'http://www.youtube.com/watch?v=-14B8l49iKA'),
(23, 'Disclosure', 'You & Me (Flume Edit)', 'http://www.youtube.com/watch?v=OUkkaqSNduU'),
(24, 'Crystal Castles', 'Doe Deer', 'http://www.youtube.com/watch?v=zop0sWrKJnQ'),
(25, 'Tok Tok vs. Soffy O.', 'Missy Queens Gonna Die', 'http://www.youtube.com/watch?v=EN0Tnw5zy6w'),
(26, 'Fink', 'Maker (Synapson Remix)', 'http://www.youtube.com/watch?v=Dyd-cUkj4Nk'),
(27, 'Flight Facilities (ft. Christine Hoberg)', 'Clair De Lune', 'http://www.youtube.com/watch?v=Jcu1AHaTchM'),
(28, 'Karmon', 'Turning Point (Original Mix)', 'https://www.youtube.com/watch?v=-tB-zyLSPEo'),
(29, 'Shuttle Life', 'The Birds', 'http://www.youtube.com/watch?v=-I3m3cWDEtM'),
(30, 'SantÃ©', 'Homegirl (Rampa Mix)', 'http://www.youtube.com/watch?v=fnhMNOWxLYw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `id_perfil` int(11) unsigned NOT NULL,
  `marcador` bigint(20) NOT NULL,
  `token_recordarme` varchar(250) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--
#Contraseñas 1234
INSERT INTO `usuario` (`id_usuario`, `login`, `pass`, `nombre`, `id_perfil`, `marcador`, `token_recordarme`) VALUES
(1, 'pepe@prueba.iescierva.net', '81dc9bdb52d04dc20036dbd8313ed055', 'Pepe García', 1, 216781394851371, 'c4be99126436fa4661ce8130b124d115f1ce659b161099976b1dd9c8d6b1a805'),
(2, 'isabel@prueba.iescierva.net', '81dc9bdb52d04dc20036dbd8313ed055', 'Isabel Sánchez', 1, 379901394849217, ''),
(3, 'juan@prueba.iescierva.net', '81dc9bdb52d04dc20036dbd8313ed055', 'Juan Gómez', 2, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
