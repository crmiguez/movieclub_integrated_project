-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 15-03-2011 a las 17:29:41
-- Versión del servidor: 5.1.51
-- Versión de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `movieclub`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `actores`
-- 

DROP TABLE IF EXISTS `actores`;
CREATE TABLE IF NOT EXISTS `actores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_artistico` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene',
  `nombre_real` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Sin nombre',
  `biografia` varchar(500) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Este/a actor/triz no tiene biografía disponible',
  `foto` varchar(300) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no_disponible.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=33 ;

-- 
-- Volcar la base de datos para la tabla `actores`
-- 

INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (1, 'Nicole Kidman', 'Nicole Mary Kidman', 'En 1988 se dio a conocer en Europa y en Estados Unidos con la película Calma total. El mayor reconocimiento profesional hasta entonces lo obtuvo en 2002, cuando fue nominada al Óscar como mejor actriz principal por su papel en Moulin Rouge!.', 'actoresfotos/moulin-rouge-original.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (2, 'John Cusack', 'John Paul Cusack', 'Nació en Evanston, Illinois, Estados Unidos. Tanto su padre Dick Cusack, como sus hermanos Ann, Bill, Joan y Susie también son actores. Lo hizo conocido fue en la de Cameron Crowe "Say Anything". Actualmente volvió a las pantallas con la comedia Jacuzzi Al Pasado, con críticas positivas por parte de la prensa cinematográfica y en la que fue productor,y el drama Shanghay.', 'actoresfotos/john_cusack.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (3, 'Jim Carrey', 'James Eugene Carrey', 'Actor y cómico canadiense, conocido por sus exageradas muecas, sus flexibles movimientos y sus histriónicas interpretaciones en comedias como Ace Ventura; aunque también ha tenido éxito en papeles dramáticos como El Show de Truman', 'actoresfotos/2Carrey.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (4, 'Didi Conn', 'Edith Bernstein', 'Actriz estadounidense de cine, televisión y teatro. Comenzó su carrera en los 70 en varias cadenas de televisión. Actuó en el musical Grease donde interpretó el papel de Frenchy. En 2002 tuvo un pequeño papel en la película Frida, además ha prestado su voz para varias películas y series de televisión.', 'actoresfotos/35.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (5, 'John Travolta', 'John Joseph Travolta', 'Actor, cantante y bailarín estadounidense, famoso por sus actuaciones en películas como Fiebre del sábado noche o Grease. Se ha desempeñado en diversos papeles, todos ellos diferentes y diversos, lo cual le ha permitido desempeñarse en multitud de géneros, dándole la reputación de actor extremadamente histriónico y versátil. Su carrera se extiende hacia más de 4 décadas, abarcando la prolífica suma de más de 40 películas.', 'actoresfotos/John_Travolta_cropped.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (6, 'Olivia Newton-John ', 'Olivia Newton-John ', 'Cantante de música pop y actriz de cine australiana de origen británico. Su mayor éxito fue Grease. Tiene una estrella con su nombre en Hollywood Boulevard, en reconocimiento de su extraordinaria trayectoria.', 'actoresfotos/olivia-newton-john.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (7, 'Jeff Conaway', 'Jeff Conaway', 'Actor estadounidense. Comenzó su carrera artísitica en Broadway a la edad de 2 años. Su trayectoria comienza a despuntar iniciada la década de los 70. Compagina sus interveniciones en pequeños papeles en televisión con actuaciones sobre los escenarios. En esa época forma parte del reparto original del musical Grease, dando vida a Kenickie. Con posterioridad ha desarrollado una carrera desigual, compaginando cine y televisión.', 'actoresfotos/jeff-conaway.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (8, 'Stockard Channing', 'Susan Antonia Williams Stockard', 'Actriz estadounidense. Es conocida por su interpretación de la Primera Dama Abbey Bartlet en la serie de televisión de la NBC The West Wing, o por el de la joven Betty Rizzo en Grease. ', 'actoresfotos/stockard-channing.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (9, 'Barry Pearl', 'Barry Lee Pearl', 'Actor estadounidense. Actuó en la película musical Grease y ha actuando en varias películas y en series de televisión como Alfred Hitchcock Presents, Growing Pains, Murder, She Wrote, Beverly Hills, 90210, entre otras y también en teatro.', 'actoresfotos/barrypearlWENheadshot.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (10, 'Michael Tucci', 'Michael Tucci', 'Comenzó su carrera como actor en la década de los 70. En 1978 actuó en la película musical Grease. También en películas como Blow, Mimic 2, entre otras.', 'actoresfotos/michael-tucci.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (11, 'Kelly Ward', 'Kelly Ward', 'Actor, escritor, productor y director de cine estadounidense. Actuó en la película musical Grease.', 'actoresfotos/K_Ward.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (12, 'Kerr Smith', 'Kerr Van Cleve Smith', 'Nació el 9 de marzo de 1972 en Filadelfia, Pensilvania. Su primer trabajo como actor fue como extra en Doce monos con Bruce Willis. Es especialmente conocido por su trabajo en la serie de TV Dawson Crece a un estudiante de secundaria gay, Jack McPhee. ', 'actoresfotos/kerr-smith.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (13, 'Ewan McGregor', 'Ewan Gordon McGregor', 'Actor británico de origen escocés. Es famoso, entre otras cosas, por haber participado en los tres primeros episodios de la saga de Star Wars. También ha actuado como la contraparte masculina en películas románticas de Hollywood como Moulin Rouge!, aunque la que lo lanzó a la fama fue la de Mark Renton, el protagonista antihéroe de la película de culto Trainspotting de Danny Boyle. ', 'actoresfotos/ewan-mcgregor.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (14, 'Jamie Donnelly', 'Jamie Donnelly', 'Actriz estadounidense. Actuó en Grease. En 1998 actuó en Slappy and the Stinkers. En 2006 en The Legend of Lucy Keyes. Actualmente esta actuando en 3 películas que se estrenaran próximamente.', 'actoresfotos/JAN.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (15, 'Amanda Peet', 'Amanda Peet', 'Su primer papel importante fue Jack en la serie Jack y Jill (1999), que duró 2 temporadas. También apareció en la octava temporada de Seinfeld, donde interpretaba a una camarera del local donde actuaba Seinfeld. El primer papel de Amanda en una película publicitada fue en 2000, con The Whole Nine Yards, elevando su nivel al de una estrella. Ese año fue elegida una de las 50 mujeres más bellas por la revista People. Apareció también en la película Tres idiotas y una bruja (2001). ', 'actoresfotos/amanda-peet.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (16, 'Clea DuVall', 'Clea Helen D´Etienne DuVall', 'Sus últimos proyectos han sido las películas Itty Bitty Titty Committee y Zodiac de David Fincher. También ha interpretado a un personaje recurrente en la serie de televisión Héroes. También se la ha visto junto a Anne Hathaway en Passengers, de Rodrigo García.', 'actoresfotos/clea-duvall.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (17, 'Chevy Chase', 'Cornelius Crane Chase', 'Cómico y actor estadounidense de gran éxito en la década del 80.', 'actoresfotos/Chevy_Chase.JPG');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (18, 'Lizzy Caplan', 'Elizabeth Anne Caplan', 'Es conocida por sus papeles en la CBS con The Class, en la película Mean Girls de 2004, y la película Cloverfield de 2008.', 'actoresfotos/Lizzy Caplan3.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (19, 'Crispin Glover', 'Crispin Hellion Glover', 'Conocido principalmente como un actor de cine, también es un pintor, cineasta, escritor, músico, coleccionista de objetos y archivista de esotérica. También por interpretar a gente excéntrica en la pantalla, interpretó a George McFly en Regreso al Futuro, Creepy Thin Man en la adaptación de Los Ángeles de Charlie y Willard Stiles en Willard.', 'actoresfotos/Crispin-glover.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (20, 'Jim Broadbent', 'James Broadbent', 'Los primeros proyectos como actor incluyeron varias producciones para The National Theatre of Brent, donde trabajó con el actor Patrick Barlow. Broadbent y Barlow interpretaron varios personajes, tanto femeninos como masculinos, para obras cómicas. En 2007 se anunció que trabajaría en la 6ª película de Harry Potter (Harry Potter y el príncipe mestizo), repitiendo su papel en la 7ª adaptación (Harry Potter y las Reliquias de la Muerte: Parte II), en 2011. ', 'actoresfotos/590px-JimBroadbent07TIFF.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (21, 'Richard Roxburgh', 'Richard Roxburgh', 'Actor australiano que participó en muchas películas australianas y ha aparecido en papeles importantes en un gran número de producciones de Hollywood. En 2005, se anunció que Roxburgh dirigiría su primera película, titulada Romulus, My Father que sería estrenada a lo largo de 2007.\r\nEn La liga de los hombres extraordinarios, sus personajes de Stealth y Van Helsing tienen en común "habilidades" de semidiós, en la medida que, siendo humanos, se dedican a generar vida de lo inerte.', 'actoresfotos/Richard_roxburgh.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (22, 'John Leguizamo', 'Jonathan Alberto Leguizamo', 'Comenzó como comediante en vivo en el circuito de clubes de Nueva York. Debutó en la televisión con un pequeño papel en la serie Miami Vice.', 'actoresfotos/Jhonny_leguizamo.jpeg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (23, 'Angelina Jolie', 'Angelina Jolie Voight', 'Es una actriz de cine y televisión, modelo, filántropa, socialité y embajadora de buena voluntad de ACNUR estadounidense. A lo largo de su carrera, Jolie ha recibido múltiples reconocimientos por sus logros actorales, entre ellos un premio Óscar y tres Globos de Oro. Es considerada una de las mujeres más atractivas del mundo y por esto es el centro de atención de varios medios del entretenimiento.', 'actoresfotos/angelina-jolie.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (24, 'Johnny Depp', 'John Christopher Depp II', 'Una de las colaboraciones más reconocidas es la que forma junto al director Tim Burton, en ocho de sus películas: Eduardo Manostijeras, Ed Wood, Sleepy Hollow (1999), Charlie y la fábrica de chocolate (2005), Corpse Bride (2005), Sweeney Todd (2007) y Alicia en el país de las maravillas (2010).', 'actoresfotos/johnny-depp-20.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (25, 'John Hawkes', 'John Hawkes', 'Actor estadounidense nacido el 11 de septiembre de 1959 en Alexandria, Minnesota. Principalmente su carrera se basa en personajes secundarios, trabajó en La tormenta perfecta, Miami Vice, Identidad y la reciente American Gangster. Participó también en la sexta y última temporada de la serie de televisión Lost.', 'actoresfotos/John-Hawkes-1.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (26, 'Rebecca De Mornay', 'Rebecca De Mornay', 'Actuaba en películas y mini-series para la televisión, a razón de una o dos producciones por años. Ha mantenido su interés por este medio en años recientes, y sigue actuando regularmente en televisión. También ha actuado en algunas ocasiones en el teatro, sobre todo en producciones montadas en teatros de Los Ángeles, como en el prestigioso Pasadena Playhouse.', 'actoresfotos/rebecca-de-mornay.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (27, 'Flavio Insinna', 'Flavio Insinna', 'Este/a actor/triz no tiene biografía disponible', 'actoresfotos/Flavio_Insinna.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (28, 'Ted Neeley', 'Ted Neeley', 'Ted Neeley (Ranger, Tejas 20 de septiembre de 1943, Estados Unidos) es batería, cantante, actor y compositor. Fue nominado en los Globos de Oro como Mejor Actor en Película Musical o Comedia en 1974.\r\nNeeley es conocido por su rango vocal y su papel como Jesús en la película de 1973 Jesucristo Superstar de Norman Jewison.En 1969 Neeley Interpretó el papel de Claude en las versiones de Nueva York y Los Ángeles de la producción Hair.', 'actoresfotos/TedNeeley.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (29, 'Carl Anderson', 'Carl Anderson', '27 de febrero de 1945 – 23 de febrero de 2004. Fue un cantante, actor de cine y teatro estadounidense más conocido por su nominación al Globo de Oro por la interpretación de Judas Iscariote en el musical de Broadway y la versión cinematagráfica de la ópera rock de Andrew Lloyd-Webber, Jesucristo Superstar.', 'actoresfotos/andersonphoto.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (30, 'Yvonne Elliman', 'Yvonne Elliman', 'Cantante y actriz estadounidense. Su padre era de ascendencia irlandesa, y su madre comparte ascendencias japonesa y china. Ella nació y creció en Honolulu, y se graduó en Presidente Theodore Roosevelt High School en 1970.', 'actoresfotos/Yvonne_Elliman.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (31, 'Barry Dennen', 'Barry Dennen', 'Según el sitio Web de Dennen, que él propuso que Jewison fuera el director de la película "Jesucrito Superstar". Jewison así lo hizo, y Dennen interpretó a Pilatos de nuevo en (1973).', 'actoresfotos/Barry Dennen 1.jpg');
INSERT INTO `actores` (`id`, `nombre_artistico`, `nombre_real`, `biografia`, `foto`) VALUES (32, 'Bob Bingham', 'Robert Bingham', 'Interpretó el papel de Caifás en la producción original de Broadway, que se desarrolló entre 1971-1973. Junto con Barry Dennen (Poncio Pilato) e Yvonne Elliman (María Magdalena), Bingham representó su papel de Broadway en la película de 1973. En 1993 apareció en la película The Nostril Picker.', 'actoresfotos/Bob-Bingham-1.jpg');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alquilan_cl_pe`
-- 

DROP TABLE IF EXISTS `alquilan_cl_pe`;
CREATE TABLE IF NOT EXISTS `alquilan_cl_pe` (
  `id_cliente` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`id_cliente`,`id_pelicula`),
  KEY `id_pelicula` (`id_pelicula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `alquilan_cl_pe`
-- 

INSERT INTO `alquilan_cl_pe` (`id_cliente`, `id_pelicula`, `fecha_inicio`, `fecha_fin`) VALUES (3, 4, '2011-01-01', '2011-03-22');
INSERT INTO `alquilan_cl_pe` (`id_cliente`, `id_pelicula`, `fecha_inicio`, `fecha_fin`) VALUES (5, 8, '2011-02-23', '2011-04-06');
INSERT INTO `alquilan_cl_pe` (`id_cliente`, `id_pelicula`, `fecha_inicio`, `fecha_fin`) VALUES (7, 9, '2011-02-15', '2011-03-21');
INSERT INTO `alquilan_cl_pe` (`id_cliente`, `id_pelicula`, `fecha_inicio`, `fecha_fin`) VALUES (7, 12, '2011-03-21', '2011-03-28');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `clientes`
-- 

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Nombre sin indentificar',
  `apellido1` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene primer apellido',
  `apellido2` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene segundo apellido',
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL DEFAULT '00000000L',
  `nombre_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene usuario',
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene dirección',
  `provincia` varchar(40) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No ha puesto provincia',
  `id_encargado` int(11) NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene email',
  `contrasenha` varchar(32) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene contraseña',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `clientes`
-- 

INSERT INTO `clientes` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`, `nombre_usuario`, `direccion`, `provincia`, `id_encargado`, `email`, `contrasenha`) VALUES (3, 'Adela', 'Rguez', 'Torres', '12345678B', 'terig98', 'Calle/ Penalbra, 23', 'Lugo', 1, 'qerts4@gmail.es', '827ccb0eea8a706c4c34a16891f84e7b');
INSERT INTO `clientes` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`, `nombre_usuario`, `direccion`, `provincia`, `id_encargado`, `email`, `contrasenha`) VALUES (5, 'Damaso', 'Miguel', 'Fernandez', '23435676I', 'Yort234', 'C./Azabache 43', 'Vizcaya', 1, 'ertt98@gmail.com', 'c91b8cf1598ce3294ec233449038ed82');
INSERT INTO `clientes` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`, `nombre_usuario`, `direccion`, `provincia`, `id_encargado`, `email`, `contrasenha`) VALUES (6, 'Arevalo', 'Torres', 'Velle', '32456789V', 'Uit67', 'C./Torrevieja 34', 'Madrid', 1, 'gte678@gmail.com', '703c606c7610c942bb63b591f83b47c0');
INSERT INTO `clientes` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`, `nombre_usuario`, `direccion`, `provincia`, `id_encargado`, `email`, `contrasenha`) VALUES (7, 'Amanda', 'Perez', 'Roda', '56704567K', 'Ovi79', 'Calle Castrizo 78', 'Zaragoza', 1, 'iligo@hotmail.com', '16501d463fbf8ead89483fadb1d5c210');
INSERT INTO `clientes` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`, `nombre_usuario`, `direccion`, `provincia`, `id_encargado`, `email`, `contrasenha`) VALUES (8, 'Candida', 'Rodriguez', 'Miguez', '12345678I', 'Uiu87', 'Calle, Castrizo 78', 'Cádiz', 1, 'iloilo@yahoo.com', '4388a555415bac35dc1e5c0900b30a65');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `directores`
-- 

DROP TABLE IF EXISTS `directores`;
CREATE TABLE IF NOT EXISTS `directores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Anónimo',
  `biografia_director` varchar(500) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Este/a director/a no tiene biografía disponible',
  `foto_director` varchar(300) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no_disponible_2.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17 ;

-- 
-- Volcar la base de datos para la tabla `directores`
-- 

INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (1, 'Fernando Trueba', 'Es hermano del guionista y productor de cine David Trueba. Estudió en la Facultad de Ciencias de la Información de Madrid. Inició como crítico de cine para el periódico El País y para La Guía del Ocio.\r\nSe dio a conocer con su primera película,Ópera prima (1980), y alcanzó la fama con la comedia Sé infiel y no mires con quién (1985).', 'directoresfotos/fernandotrueba.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (2, 'Baz Luhrmann', 'Nació en New South Wales (Australia). Tras una discreta carrera como actor comenzada en los años 70 alcanzó fama internacional con producciones de Hollywood en los 90.', 'directoresfotos/Baz-Luhrmann.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (3, 'Don Bluth', 'Director, productor y animador estadounidense. Se convirtió en uno de los animadores más importantes de Disney. En 1979 instaló su propio estudio de animación, Don Bluth Productions.', 'directoresfotos/DonBluth.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (4, 'Darren Aronofsky', 'Como director de largometrajes se remonta al año 1998, fecha en la que se estrenó la película Pi. Logró un gran éxito de crítica y público, y obtuvo varios galardones, entre los cuales destaca el del Festival de Sundance como director.', 'directoresfotos/Darren-Aronofsky.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (5, 'Rodrigo Cortés', 'Nació en Pazos Hermos, Ourense. Es un director, actor, productor y guionista español. A los 16 años realizó su primer cortometraje, El descomedido y espantoso caso del victimario de Salamanca. Actualmente se encuentra trabajando en la película Red Lights, una película del género thriller.', 'directoresfotos/rodrigo-cortes.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (6, 'Steve Pink', 'Productor, director, guionista y actor de cine y televisión estadounidense. Fundó su propia productora, New Crime Productions, junto a John Cusack y Jeremy Piven. ', 'directoresfotos/steve-pink.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (7, 'Gore Verbinski', 'Verbinski se licenció en la Universidad de UCLA en 1987, donde estudió Cinematografía y Televisión. Antes de dedicarse al cine, dirigió numerosos anuncios, con los que consiguió diversos premios. Se estrenó como director con la comedia Un ratoncito duro de roer. Tras este trabajo, dirigió The Mexican. Pero su salto a la fama se dio con la trilogía de Piratas del Caribe, ahora se esta preparando una cuarta parte en 3-D que no dirigirá él.', 'directoresfotos/gore-verbinski.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (8, 'James Mangold', 'Debutó como director con Heavy (1995), película con la que consiguió el premio del Festival de Cine de Gijón en dos categorías, así como el galardón Sundance Film Festival. También rodó la cinta Girl, Interrupted (1999), con la cual ésta última consiguiera un Óscar. ', 'directoresfotos/James_Mangold.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (9, 'Randal Kleiser', 'Cuando era joven, en la Universidad del Sur de California, apareció en "Freiheit", la primera película estudiantil de George Lucas. Por otro lado, el director ha impartido clases de producción para estudiantes de cine en la Universidad del Sur de California. ', 'directoresfotos/directorgrease.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (10, 'Florian Henckel von Donnersmarck', 'Es un director de cine y guionista alemán.', 'directoresfotos/Florian_Henckel_von_Donnersmarck_Tourist.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (11, 'Miguel Angel Vivas', 'Este/a director/a no tiene biografía disponible', 'directoresfotos/Miguel_Angel_Vivas.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (12, 'Norman Jewison', 'Su debut como director fue con Soltero en apuros (40 Pounds of Trouble) al que siguieron títulos como No me mandes flores (Send Me No Flowers, 1964), El arte de amar (The Art of Love, 1965) o El rey de juego (The Cincinnati Kid, 1965). Pero su primer éxito llegó con En el calor de la noche (In the Heat of the Night, 1967), una excelente película a medio camino entre el thriller policíaco y el cine de denuncia.', 'directoresfotos/norman-jewison.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (13, 'Phillip Noyce', 'Este/a director/a no tiene biografía disponible', 'directoresfotos/phillip-noyce.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (14, 'Simon West', 'Director de cine inglés. Nació en Letchworth, Hertfordshire. Comenzó como montador en la BBC y más tarde dirigió doculmentales y anuncios, incluyendo varios comerciales para Budweiser. Su carrera como director de cine empezó con Con Air en 1997.', 'directoresfotos/SimonWest.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (15, 'Jan de Bont', 'Este/a director/a no tiene biografía disponible', 'directoresfotos/Jan-de-Bont.jpg');
INSERT INTO `directores` (`id`, `nombre`, `biografia_director`, `foto_director`) VALUES (16, 'Ludovico Gasparini', 'Este/a director/a no tiene biografía disponible', 'directoresfotos/ludovico-gasparini.jpg');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `encargados`
-- 

DROP TABLE IF EXISTS `encargados`;
CREATE TABLE IF NOT EXISTS `encargados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Nombre sin indentificar',
  `apellido1` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene primer apellido',
  `apellido2` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene segundo apellido',
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL DEFAULT '00000000L',
  `nombre_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene usuario',
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene dirección',
  `provincia` varchar(40) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No ha puesto provincia',
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene email',
  `contrasenha` varchar(32) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No tiene contraseña',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `encargados`
-- 

INSERT INTO `encargados` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`, `nombre_usuario`, `direccion`, `provincia`, `email`, `contrasenha`) VALUES (2, 'Candida', 'Rodriguez', 'Miguez', '44444444P', 'youi3', 'C./Trevinca, 23 1ºB', 'Lugo', 'jihk@gmail.com', '248e844336797ec98478f85e7626de4a');
INSERT INTO `encargados` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`, `nombre_usuario`, `direccion`, `provincia`, `email`, `contrasenha`) VALUES (3, 'Candy', 'Rguez', 'Miguez', '23098767Y', 'Admin91', 'C./Cerrelo 67', 'Málaga', 'candidarm@gmail.com', '0ba710c882f4de4c050ddaa32e169ca3');
INSERT INTO `encargados` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`, `nombre_usuario`, `direccion`, `provincia`, `email`, `contrasenha`) VALUES (4, 'Candida', 'Rguez', 'Miguez', '23456789Q', 'AdminP', 'C./Santalices 67', 'Ourense', 'crmiguez@hotmail.com', 'e8f0352c365dbaf52f31e2570104959a');
INSERT INTO `encargados` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`, `nombre_usuario`, `direccion`, `provincia`, `email`, `contrasenha`) VALUES (6, 'Candy', 'Rguez', 'Miguez', '87654321I', 'Moti91', 'C./Azabache-Blanco, 34', 'Ourense', 'usun@hotmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `generos`
-- 

DROP TABLE IF EXISTS `generos`;
CREATE TABLE IF NOT EXISTS `generos` (
  `id` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'SG',
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Sin Género',
  `descripcion` varchar(500) COLLATE utf8_spanish_ci DEFAULT 'Aquellas películas que no tienen género específico',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `generos`
-- 

INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('AC', 'Acción', 'Aquellas películas que contienen momentos de acción.');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('AM', 'Animación', 'Aquellas películas que son dibujos animados.');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('AV', 'Aventuras', 'Aquellas películas que contienen momentos de aventuras.');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('BP', 'Biopic', 'Aquellas películas que dramatizan momentos biográficos de un personaje');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('CF', 'Ciencia Ficción', 'Aquellas películas que contienen fenómenos paranormales o del futuro.');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('CM', 'Comedia', 'Aquellas películas que tienen clave de humor');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('CR', 'Comedia Romántica', 'Aquellas películas que mezclan momentos románticos con comedia');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('CT', 'Comedia-Terror', 'Aquellas películas que mezclan momentos de terror y comedia');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('DM', 'Drama', 'Aquellas películas que contienen momentos dramaticos.');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('ES', 'Española', 'Aquellas películas que son de España');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('HT', 'Histórica', 'Aquellas películas que tienen ambientación histórica');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('MS', 'Musical', 'Aquellas películas ambientadas en estilo Broadway');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('SG', 'Sin Género', 'Aquellas películas que no tienen género específico');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('TL', 'Triller', 'Aquellas películas que crean tensión ante el espectador');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('TR', 'Terror', 'Aquellas películas que tienen momentos de miedo');
INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES ('VO', 'Versión Original', 'Aquellas películas con idioma original, sin doblaje');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `interpretan_ac_pe`
-- 

DROP TABLE IF EXISTS `interpretan_ac_pe`;
CREATE TABLE IF NOT EXISTS `interpretan_ac_pe` (
  `id_actor` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  PRIMARY KEY (`id_actor`,`id_pelicula`),
  KEY `id_pelicula` (`id_pelicula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `interpretan_ac_pe`
-- 

INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (2, 1);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (17, 1);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (18, 1);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (19, 1);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (24, 3);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (2, 4);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (15, 4);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (16, 4);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (25, 4);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (26, 4);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (2, 5);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (1, 6);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (13, 6);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (20, 6);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (21, 6);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (22, 6);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (5, 7);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (6, 7);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (7, 7);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (8, 7);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (9, 7);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (10, 7);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (11, 7);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (14, 7);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (23, 8);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (24, 8);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (28, 9);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (29, 9);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (30, 9);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (31, 9);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (32, 9);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (23, 10);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (23, 11);
INSERT INTO `interpretan_ac_pe` (`id_actor`, `id_pelicula`) VALUES (27, 12);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `peliculas`
-- 

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE IF NOT EXISTS `peliculas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Título desconocido',
  `trailer` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No Disponible',
  `cartel` varchar(300) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no_disponible_3.jpg',
  `clasificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Para todos los públicos',
  `anho` year(4) NOT NULL DEFAULT '0000',
  `id_director` int(11) NOT NULL,
  `id_genero` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `id_encargado` int(11) NOT NULL,
  `argumento` varchar(500) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No Disponible',
  `visitas` int(11) NOT NULL DEFAULT '0',
  `id_tarifa` int(11) NOT NULL,
  `disponible` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_director` (`id_director`),
  KEY `id_genero` (`id_genero`),
  KEY `id_encargado` (`id_encargado`),
  KEY `id_tarifa` (`id_tarifa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

-- 
-- Volcar la base de datos para la tabla `peliculas`
-- 

INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (1, 'Jacuzzi Al Pasado', 'http://www.youtube-nocookie.com/v/SrTPJbEYs1E?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/jacuzzi-al-pasado-cartel1.jpg', 'Para mayores de 13 años', 2010, 6, 'CM', 2, 'Tres amigos que deciden pasar un fin de semana en un hotel de montaña. La modernidad parecía haberse apoderado del lugar, al menos eso es lo que pensaron al observar el jacuzzi. Pronto, ese espacio los seduce y, como por arte de magia, los traslada en el tiempo hasta depositarlos en el año 1986.', 13, 1, 3);
INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (2, 'Chico y Rita', 'http://www.youtube-nocookie.com/v/RsSWB6uejws?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/chicorita.jpg', 'Para mayores de 18 años', 2011, 1, 'AM', 2, 'En la Cuba de finales de los años cuarenta, Chico y Rita inician una apasionada historia de amor. Chico es un joven pianista enamorado del jazz y Rita sueña con ser una gran cantante. Desde la noche que el destino los junta en un baile en un club de La Habana, la vida va uniéndoles y separándoles, como a los personajes de un bolero.', 52, 1, 2);
INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (3, 'Rango', 'http://www.youtube-nocookie.com/v/VKVzjy7SKy8?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/rango.jpg', 'Para todos los públicos', 2011, 7, 'AM', 2, 'Mientras viajaba hacia el Este con su familia, un camaleón llamado Rango (voz de Johnny Depp) queda accidentalmente atrapado en un pueblo del viejo Oeste, llamado Dirt. Rodeado de una gran cantidad de locales extraños, Rango emprende un emocionante viaje para descubrir el héroe que tiene dentro.', 21, 1, 0);
INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (4, 'Identidad', 'http://www.youtube-nocookie.com/v/BGp77-JfwDo?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/Identidad.jpg', 'Mayores de 18 años', 2003, 8, 'TL', 2, 'Diez personas quedan aisladas en un motel durante una jornada de un diluvio infernal. Uno a uno comienzan a morir, y parece imposible hallar al asesino o alguna razón explicativa de los hechos.', 47, 1, 0);
INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (5, 'Anastasia', 'http://www.youtube-nocookie.com/v/RoWj3C6aNl0?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/Anastasia.jpg', 'Para todos los públicos', 1997, 3, 'AM', 2, 'Es la historia archiconocida de Anastasia. Ella es una joven que parece ser la sobreviviente de los Romanoff, los fusilados zares rusos. Como posee amnesia, un joven intenta convertirla en la verdadera hija de los Romanoff para cobrar la recomepensa que ofrece su tía por ella, pero se enamora.', 108, 1, 0);
INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (6, 'Moulin Rouge!', 'http://www.youtube-nocookie.com/v/6KkNqJaI3Qs?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/moulin_rouge.jpg', 'Para mayores de 7 años', 2001, 2, 'MS', 2, 'Año 1900, París. El bohemio Christian (Ewan McGregor) se enamora de la estrella del Moulin Rouge Satine (Nicole Kidman) y una noche, tras un malentendido, sus caminos terminan por cruzarse. Todo cambiará cuando ella descubra que Christian no es el millonario duque al que está dispuesta a convencer para financiar una obra teatral. Se debatirá entre el amor que siente hacia el bohemio o el interés hacia el duque (Richard Roxburgh) y poder convertirse en una gran actriz.', 113, 1, 0);
INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (7, 'Grease', 'http://www.youtube-nocookie.com/v/PDpOM0L9eQI?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/grease.jpg', 'Para mayores de 7 años', 1978, 9, 'MS', 2, 'Cuenta la historia de amor del rebelde Danny y la inocente Sandy. Ambos se conocen durante el verano y al despedirse ninguno de los dos piensa en que se vayan a ver de nuevo. Pero se equivocaban.', 12, 1, 0);
INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (8, 'The Tourist', 'http://www.youtube-nocookie.com/v/dNCtslSyQK4?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/the-tourist-cartel1.jpg', 'Para mayores de 13 años', 2010, 10, 'AC', 2, 'Frank Tupelo es un maestro de escuela americano que está de turista en viaje a Venecia para superar la muerte de su compañera sentimental. Elise Ward es una misteriosa mujer perseguida y espiada las 24 horas por el Scotland Yard con una misión: debe escoger en el tren hacia Venecia, a un hombre que fuera de la misma talla, contextura y apariencia y convertirlo en su títere. El elegido no es otro que Frank, que verá su vida en peligro al unirse con ella.', 3, 1, 1);
INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (9, 'Jesucristo Superstar', 'http://www.youtube-nocookie.com/v/MfTqTsKz5RA?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/JesusChristSuperstar.jpg', 'Para todos los públicos', 1973, 12, 'MS', 2, 'La película comienza con la llegada de todos los actores en un colectivo y la obertura está dedicada a la identificación entre ellos de Jesús, quien emerge de en medio del grupo al tiempo que es investido con una sencilla túnica blanca, mientras extiende sus brazos, creando el centro de la atención al momento en que suenan los acordes que identifican la melodía principal.', 0, 1, 1);
INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (10, 'Tomb Raider', 'http://www.youtube-nocookie.com/v/jqTuOl3U684?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/pelicula-lara-croft-tomb-raider.jpg', 'Para mayores de 7 años', 2001, 14, 'AV', 2, 'Película basada en la popular serie de videojuegos Tomb Raider, protagonizada por el personaje Lara Croft. Fue estrenada durante el verano de 2001.', 30, 1, 3);
INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (11, 'Tomb Raider: La Cuna De La Vida', 'http://www.youtube-nocookie.com/v/X6pSH7FXTFg?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/la.cuna.de.la.vida.jpg', 'Para mayores de 7 años', 2003, 15, 'AV', 2, 'Segunda parte de la película basada en la popular serie de videojuegos Tomb Raider, protagonizada por el personaje Lara Croft.', 18, 1, 1);
INSERT INTO `peliculas` (`id`, `titulo`, `trailer`, `cartel`, `clasificacion`, `anho`, `id_director`, `id_genero`, `id_encargado`, `argumento`, `visitas`, `id_tarifa`, `disponible`) VALUES (12, 'Don Bosco, la película', 'http://www.youtube-nocookie.com/v/XeXlj8b-nLY?fs=1&amp;hl=es_ES&amp;rel=0', 'carteles/DONBOSCO.jpg', 'Para todos los públicos', 2004, 16, 'HT', 2, 'Narran la vida del santo turinés que, en la segunda mitad del siglo XIX, puso en marcha un sistema educativo para atender a los jóvenes más necesitados de la sociedad de su tiempo. Una sociedad atravesada por conflictos políticos, luchas religiosas, y en pleno desarrollo industrial que iba dejando, por las calles de las ciudades del norte de Italia, a numerosos jóvenes de los que nadie se ocupaba.', 49, 1, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `premios`
-- 

DROP TABLE IF EXISTS `premios`;
CREATE TABLE IF NOT EXISTS `premios` (
  `id` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NTP',
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No Tiene Premio',
  `id_pelicula` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pelicula` (`id_pelicula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `premios`
-- 

INSERT INTO `premios` (`id`, `nombre`, `id_pelicula`) VALUES ('FIT', 'Festival Internacional Toronto', 2);
INSERT INTO `premios` (`id`, `nombre`, `id_pelicula`) VALUES ('GPH', 'Gran Prix Holland', 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tarifas`
-- 

DROP TABLE IF EXISTS `tarifas`;
CREATE TABLE IF NOT EXISTS `tarifas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precio` int(11) NOT NULL DEFAULT '0',
  `id_encargado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_encargado` (`id_encargado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `tarifas`
-- 

INSERT INTO `tarifas` (`id`, `precio`, `id_encargado`) VALUES (1, 25, 2);

-- 
-- Filtros para las tablas descargadas (dump)
-- 

-- 
-- Filtros para la tabla `alquilan_cl_pe`
-- 
ALTER TABLE `alquilan_cl_pe`
  ADD CONSTRAINT `alquilan_cl_pe_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `alquilan_cl_pe_ibfk_2` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`);

-- 
-- Filtros para la tabla `interpretan_ac_pe`
-- 
ALTER TABLE `interpretan_ac_pe`
  ADD CONSTRAINT `interpretan_ac_pe_ibfk_1` FOREIGN KEY (`id_actor`) REFERENCES `actores` (`id`),
  ADD CONSTRAINT `interpretan_ac_pe_ibfk_2` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`);

-- 
-- Filtros para la tabla `peliculas`
-- 
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_director`) REFERENCES `directores` (`id`),
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `peliculas_ibfk_3` FOREIGN KEY (`id_encargado`) REFERENCES `encargados` (`id`),
  ADD CONSTRAINT `peliculas_ibfk_4` FOREIGN KEY (`id_tarifa`) REFERENCES `tarifas` (`id`);

-- 
-- Filtros para la tabla `premios`
-- 
ALTER TABLE `premios`
  ADD CONSTRAINT `premios_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`);

-- 
-- Filtros para la tabla `tarifas`
-- 
ALTER TABLE `tarifas`
  ADD CONSTRAINT `tarifas_ibfk_1` FOREIGN KEY (`id_encargado`) REFERENCES `encargados` (`id`);
