-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2018 a las 15:17:57
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daw204_tiendaonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codProducto` int(11) NOT NULL,
  `descProducto` varchar(2000) NOT NULL,
  `Caracteristicas` varchar(2000) NOT NULL,
  `familia` varchar(255) NOT NULL,
  `imagen` varchar(5000) NOT NULL,
  `Precio` float NOT NULL,
  `Marca` varchar(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codProducto`, `descProducto`, `Caracteristicas`, `familia`, `imagen`, `Precio`, `Marca`, `Nombre`) VALUES
(1, 'Here’s one for those who like keeping things simple and powerful. The BlackWidow X Ultimate boasts durable reliability and a sleek, compact body—exuding team spirit with mechanical keys backlit in Razer Green.', 'Razer,Teclado Mecanico,10 key roll-over anti-ghosting,Individually backlit keys with dynamic lighting effects', 'Teclado', 'webroot/img/RazerTeclado/1.jpg,webroot/img/RazerTeclado/2.jpg,webroot/img/RazerTeclado/3.jpg,webroot/img/RazerTeclado/4.jpg,webroot/img/RazerTeclado/5.jpg,webroot/img/RazerTeclado/6.jpg,webroot/img/RazerTeclado/7.jpg,webroot/img/RazerTeclado/8.jpg', 130, 'Razer', 'BlackWidow X Ultimate'),
(2, 'Designed with only the most important features for tournament grade gaming, the Razer Abyssus V2 is the essential gaming mouse for any playing style. The Razer Abyssus V2 comes with an improved ambidextrous form factor, an all-new true 5,000 DPI optical sensor and in-mould rubber side grips.', 'Razer,Raton Optico,5000 DPI optical sensor,3 Luces Distintas', 'Raton', 'webroot/img/RazerRaton/1.jpg,webroot/img/RazerRaton/2.jpg,webroot/img/RazerRaton/3.jpg,webroot/img/RazerRaton/4.jpg,webroot/img/RazerRaton/5.jpg', 44, 'Razer', 'Abyssus V2'),
(3, 'La nueva GeForce GTX 1080 ha sido cuidadosamente diseñada para mejorar la disipación del calor mediante una tecnología de refrigeración basada en una cámara de vapor avanzada y materiales de la mejor calidad, así que es tan atractiva por fuera como por dentro.', 'Arquitectura de GPU Pascal,Memoria de vídeo 8 GB GDDR5X,Frecuencia de la memoria 10 Gbps,Frecuencia acelerada relativa 1.4x,Frecuencia acelerada real 1733 MHz', 'Tarjeta Grafica', 'webroot/img/Nvidia1080/1.jpg,webroot/img/Nvidia1080/2.jpg,webroot/img/Nvidia1080/3.jpg,webroot/img/Nvidia1080/4.jpg,webroot/img/Nvidia1080/5.jpg', 649, 'Nvidia', 'GEFORCE GTX 1080'),
(4, 'EL SENSOR ÓPTICO MÁS AVANZADO DEL MUNDO\r\nEquipado con el nuevo sensor óptico para Esports que ofrece 16.000 ppp reales y una capacidad de rastreo de 450 pulgadas por segundo (IPS), el Razer DeathAdder Elite te da la ventaja definitiva al disponer del sensor más rápido del mercado.\r\nSWITCHES MECÁNICOS RAZER™ OPTIMIZADOS PARA EL JUEGO\r\nDiseñados para darte una ventaja definitiva en las acciones de juego más intensas, el ratón Razer DeathAdder Elite incorpora los nuevos switches mecánicos Razer™. ', 'Sensor óptico de 16.000 ppp reales,\r\nHasta 450 IPS /50 g de aceleración,\r\nSwitches mecánicos Razer para ratón,\r\nDiseño ergonómico para diestros con agarres laterales de goma texturizada,\r\nRueda de desplazamiento táctil especial para juegos,\r\n7 botones Hyperesponse programables de forma independiente,\r\nIluminación Razer Chroma™ con 16,8 millones de opciones de color personalizables,\r\nPreparado para Razer Synapse,\r\nUltrapolling de 1.000 Hz,\r\nAjuste de sensibilidad instantáneo,\r\nConector USB dorado,\r\nCable de 2 m (siete pies) de longitud ligero de fibra trenzada.,\r\nTamaño aproximado: 127 mm / 5 ” (longitud) x 70 mm / 2.76 ” (ancho) x 44 mm / 1.73 ” (altura),\r\nPeso aproximado: 105 g / 0.23 lb', 'Raton', 'webroot/img/RazerDeath/1.jpg,webroot/img/RazerDeath/2.jpg,webroot/img/RazerDeath/3.jpg,webroot/img/RazerDeath/4.jpg,webroot/img/RazerDeath/5.jpg', 79, 'Razer', 'DeathAdder Elite'),
(5, 'El Razer Kraken Pro V2 viene equipado con diafragmas más grandes que su predecesor para crear una escenarios sonoro más intenso y complejo. Te sentirás en el centro del acción de juego y tendrás la seguridad de que las comunicaciones de tu equipo se escuchan con absoluta claridad.\r\nFabricada en aluminio de bauxita, toda la estructura del Razer Kraken Pro V2 es ligera, flexible y extremadamente resistente. Ha sido probada a fondo para hacer frente a las grandes exigencias del juego profesional.', 'Respuesta de frecuencia: 12 Hz – 28 kHz,\r\nImpedancia: 32 ? @ 1 kHz,\r\nSensibilidad (@1 kHz): 118 dB,\r\nPotencia de entrada: 30 mW (Max),\r\nDiafragmas: 50 mm,\r\nCon imanes de neodimio,\r\nRueda de control analógico de volumen,\r\nConmutador de silencio del micrófono\r\n', 'Auricular', 'webroot/img/RazerKraken/1.jpg,webroot/img/RazerKraken/2.jpg,webroot/img/RazerKraken/3.jpg,webroot/img/RazerKraken/4.jpg,webroot/img/RazerKraken/5.jpg,webroot/img/RazerKraken/6.jpg,webroot/img/RazerKraken/7.jpg,', 89, 'Razer', 'KRAKEN PRO V2'),
(8, 'Para un profesional de los Esports es esencial tener un mando que se adapte a cualquier situación fácilmente. Ese era nuestro objetivo y lo hemos superado. Al optimizar la ergonomía para mejorar la comodidad y añadir un paquete completo de funciones, hemos conseguido el mando perfecto para jugar en torneos y conseguir victorias únicas.\r\nUnos milisegundos marcan la diferencia cuando estás en el fragor de batalla. Para conseguir una ventaja competitiva, cambia al modo de gatillo sensible. Cuando este modo está activado, los switches de tope mecánico reducen la distancia de recorrido de los dos gatillos principales. Solo tienes que pulsar ligeramente para abrir fuego rápido instantáneamente.', 'Compatible con Xbox One y PC (Windows® 10),\r\nCuatro botones superiores frontales adicionales y reasignables,\r\nIluminación Razer Chroma,\r\nModo de gatillo sensible con topes en los gatillos,\r\nAgarre de goma antideslizante y ergonómico,\r\n12 months warranty,\r\n4 botones multifunción,\r\n4 botones acciones táctiles mecanizados ABXY,\r\nTira de iluminación multicolor de Razer Chroma,\r\nTopes de gatillo para fuego rápido', 'Mando', 'webroot/img/RazerMando/1.jpg,webroot/img/RazerMando/2.jpg,webroot/img/RazerMando/3.jpg,webroot/img/RazerMando/4.jpg', 139.99, 'Razer', 'WOLVERINE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codUsuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `perfil` varchar(255) NOT NULL,
  `ultimaConexion` date NOT NULL,
  `contadorAccesos` int(11) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codUsuario`, `password`, `perfil`, `ultimaConexion`, `contadorAccesos`, `Apellidos`, `Direccion`, `Email`) VALUES
('admin', '4dd09b8f659e27847f94782920fb7e41b2c5afbd7f419a4a3ed8ab7aa5b7f944', 'admin', '2018-02-17', 3, 'Jefazo Maximo', 'MiCasa', 'admin@admin.com'),
('geo', '4dd09b8f659e27847f94782920fb7e41b2c5afbd7f419a4a3ed8ab7aa5b7f944', 'usuario', '2018-02-18', 1, 'The Geo', 'Geo Houser', 'warrock225@gmail.com'),
('rodrigo', '4dd09b8f659e27847f94782920fb7e41b2c5afbd7f419a4a3ed8ab7aa5b7f944', 'usuario', '2018-02-18', 45, 'Gutierrez Olle', 'Santo Domingo N 15 3I', 'warrock225@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
