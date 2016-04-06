SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos (dbdebut): 
--

/* Se elimina la base de datos si la hubiese */
DROP DATABASE IF EXISTS dbdebut;
/* Creacion de la base de datos */
CREATE DATABASE dbdebut character set utf8 collate utf8_general_ci;
/* Uso de la base de datos */
USE dbdebut;

/* ---------------------------------------------------------- */

--
-- Estructura de tabla para la tabla 'pregunta'
--

CREATE TABLE IF NOT EXISTS entrada (
  id_entrada int(10) NOT NULL AUTO_INCREMENT,
  titulo varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL, /* Por el momento es un varchar amplio */
  cuerpo text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (id_pregunta)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla 'pregunta'
--

INSERT INTO entrada (id_entrada, titulo, cuerpo) VALUES
(1, 'Hola mundo!', 'Este es el cuerpo de la primera entrada de prueba de esta aplicación. En este campo podemos escribir cualquier cosa...'),
(2, '¿Conocéis a Marea?', 'Marea es un grupo de música rock (original de Berriozar, Navarra) formado en 1997 por Kutxi Romero. Es considerada una de las bandas dentro del panorama del rock urbano más exitosas.1 En su discografía se encuentran seis álbumes de estudio, dos recopilaciones y un álbum en directo. - Wikipedia.'),
(3, 'El uso de los frameworks', 'Podemos usar frameworks para agilizar el proceso de creación de software y para su mantenimiento. ¿Creéis que el paradigma MVC es un tipo de framework?'),
(4, 'Hablemos de Michael Jordan', 'Michael Jeffrey Jordan, (Brooklyn, Nueva York, Estados Unidos, 17 de febrero de 1963), más conocido como Michael Jordan, es un exjugador de baloncesto estadounidense. En la actualidad es propietario del equipo de la NBA los Charlotte Hornets.2 Está considerado por la mayoría de aficionados y especialistas como el mejor jugador de baloncesto de todos los tiempos.3 Se retiró definitivamente en 2003 en los Washington Wizards, tras haberlo hecho en dos ocasiones anteriores, en 1993 y 1999, después de haber jugado 13 temporadas en los Chicago Bulls. - Wikipedia'),
(5, '¿Qué opinan del calentamiento global?', 'Es un tema demasiado importante como para obviarlo...'),
(6, 'Una entrada de ejemplo más', 'Soy Dani. Visítame en <a href="http://danmnez.me">Mi blog</a> para más publicaciones!');

/* ---------------------------------------------------------- */

--
-- Estructura de tabla para la tabla 'respuesta'
--

CREATE TABLE IF NOT EXISTS respuesta (
  id_respuesta int(10) NOT NULL AUTO_INCREMENT,
  id_pregunta int(10) NOT NULL,
  id_usuario int(10) NOT NULL,
  cuerpo text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id_respuesta)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla 'respuesta'
--

INSERT INTO respuesta (id_respuesta, id_pregunta, id_usuario, cuerpo) VALUES
(1, 1, 1, 'Hola!, soy pepe. ¡Qué bien el inicio de este blog! :)'),
(2, 1, 2, 'Si!!!, yo soy Isabel y también estoy muy contenta jiji'),
(3, 2, 3, 'Joder, tío. Me encanta este grupo! Hace no mucho estuve en un concierto suyo. Viva MAREAAA'),
(4, 3, 3, '¿Frameworks tío? Qué puñetas es eso...'),
(5, 3, 1, 'Yo uso Debut como framework para mis proyectos en MVC. Opino que no hay que reinventar la rueda para trabajar y que un framework para tus proyectos es la mejor opción ;)'),
(6, 4, 2, '*___* Jordan me vuelve loca jiji'),
(7, 5, 3, 'Es verdad macho, hay que tener más conciencia con estos temas tío.'),
(8, 5, 2, 'Ayayayay estamos perdiendo a muchas especies por nuestra culpa!! T__T'),
(9, 6, 1, 'Gracias Dani, estaré atento a las nuevas publicaciones je'),
(10, 6, 3, 'Si eso, gracias colega ;)');

/* ---------------------------------------------------------- */

--
-- Estructura de tabla para la tabla 'usuario'
--

CREATE TABLE IF NOT EXISTS usuario (
  id_usuario int(11) NOT NULL AUTO_INCREMENT,
  login varchar(50) NOT NULL,
  pass varchar(250) NOT NULL,
  nombre varchar(200) NOT NULL,
  id_perfil int(11) unsigned NOT NULL,
  marcador bigint(20) NOT NULL,
  token_recordarme varchar(250) NOT NULL,
  PRIMARY KEY (id_usuario),
  UNIQUE KEY login (login)
) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 4 ;

--
-- Volcado de datos para la tabla 'usuario' (contraseñas 1234)
--
INSERT INTO usuario (id_usuario, login, pass, nombre, id_perfil, marcador, token_recordarme) VALUES
(1, 'pepe@prueba.iescierva.net', '81dc9bdb52d04dc20036dbd8313ed055', 'Pepe García', 1, 216781394851371, 'c4be99126436fa4661ce8130b124d115f1ce659b161099976b1dd9c8d6b1a805'),
(2, 'isabel@prueba.iescierva.net', '81dc9bdb52d04dc20036dbd8313ed055', 'Isabel Sánchez', 1, 379901394849217, ''),
(3, 'juan@prueba.iescierva.net', '81dc9bdb52d04dc20036dbd8313ed055', 'Juan Gómez', 2, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
