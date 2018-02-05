create database if not exists DAW204_DBEncuesta;
use DAW204_DBEncuesta;

CREATE TABLE `Datos` (
  `Dni` varchar(9) NOT NULL primary key,
  `NombreApellido` varchar(200) NOT NULL,
  `Bday` date NOT NULL,
  `Satisfacion` int(11) NOT NULL,
  `Valoracion` enum('malos','muy mejorables','regulares','buenos','muy buenos') NOT NULL,
  `correo` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `opinion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
